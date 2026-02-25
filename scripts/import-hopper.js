/**
 * import-hopper.js
 *
 * Imports old-format hopper and dump .txt files into the new Kirby CMS format.
 * Run with: node scripts/import-hopper.js
 *
 * Configure the input/output paths below before running.
 */

import { readFileSync, writeFileSync } from "fs";
import { resolve, dirname } from "path";
import { fileURLToPath } from "url";
import yaml from "js-yaml";

const __dirname = dirname(fileURLToPath(import.meta.url));
const root = resolve(__dirname, "..");

// =============================================================================
// CONFIGURE INPUT AND OUTPUT FILES HERE
// =============================================================================

const HOPPER_INPUT = "content_old/7-submit/3-hopper/hopper.txt";
const HOPPER_OUTPUT = "content/7_submit/hopper/hopper.txt";

const DUMP_INPUT = "content_old/7-submit/2-dump/dump.txt";
const DUMP_OUTPUT = "content/7_submit/dump/dump.txt";

// =============================================================================

/**
 * Split a Kirby flat-file content string into its named sections.
 * Each section is separated by a line containing only "----".
 * Returns a plain object: { SectionName: "content string", ... }
 */
function parseKirbySections(fileContent) {
  // Handle both Unix (\n) and Windows (\r\n) line endings
  const sectionRegex = /\r?\n[ \t]*----[ \t]*\r?\n/;
  const parts = fileContent.split(sectionRegex);
  const result = {};
  for (const part of parts) {
    const trimmed = part.trim();
    if (!trimmed) continue;
    const colonIdx = trimmed.indexOf(":");
    if (colonIdx === -1) continue;
    const key = trimmed.substring(0, colonIdx).trim();
    const value = trimmed.substring(colonIdx + 1);
    result[key] = value;
  }
  return result;
}

/**
 * Parse the "Builder:" YAML block from the old file.
 * Returns an array of entry objects.
 */
function parseBuilderSection(rawContent) {
  // rawContent is the value after "Builder:" in the Kirby section
  // Prepend the key so js-yaml can parse it
  const yamlString = "Builder:" + rawContent;
  const parsed = yaml.load(yamlString, { schema: yaml.DEFAULT_SCHEMA });
  return Array.isArray(parsed?.Builder) ? parsed.Builder : [];
}

/**
 * Convert a value to a YYYY-MM-DD date string if it is a Date object,
 * otherwise return the value unchanged.
 */
function normalizeDate(value) {
  if (value instanceof Date) {
    const y = value.getUTCFullYear();
    const m = String(value.getUTCMonth() + 1).padStart(2, "0");
    const d = String(value.getUTCDate()).padStart(2, "0");
    return `${y}-${m}-${d}`;
  }
  return value;
}

/**
 * Single-quote a scalar value for Kirby YAML output.
 * Embedded single quotes are escaped by doubling them.
 */
function sq(value) {
  if (value === null || value === undefined) value = "";
  value = normalizeDate(value);
  return `'${String(value).trim().replace(/'/g, "''")}'`;
}

/**
 * Convert old "0"/"1" (or missing) boolean-like values to 'true'/'false'.
 */
function boolStr(value) {
  if (value === "1" || value === 1 || value === true || value === "true") {
    return "'true'";
  }
  return "'false'";
}

/**
 * Format a single hopper entry in the new Kirby YAML style.
 */
function formatHopperEntry(item) {
  const title = sq(item.title);
  const docurl = sq(item.docurl); // js-yaml resolves the > folded scalar
  const submitter = sq(item.submitter);
  const subdate = sq(item.subdate);
  const gd_flag = boolStr(item.gd_flag ?? "0");
  const dibs = sq(item.dibs ?? "");
  const recorded = boolStr(item.recorded ?? "0");

  return [
    "-",
    `  title: ${title}`,
    `  docurl: ${docurl}`,
    `  submitter: ${submitter}`,
    `  subdate: ${subdate}`,
    `  gd_flag: ${gd_flag}`,
    `  dibs: ${dibs}`,
    `  recorded: ${recorded}`,
  ].join("\n");
}

/**
 * Format a single dump entry in the new Kirby YAML style.
 */
function formatDumpEntry(item) {
  const title = sq(item.title);
  const docurl = sq(item.docurl);
  const submitter = sq(item.submitter);
  const rejectdate = sq(item.rejectdate);

  return [
    "-",
    `  title: ${title}`,
    `  docurl: ${docurl}`,
    `  submitter: ${submitter}`,
    `  rejectdate: ${rejectdate}`,
  ].join("\n");
}

/**
 * In the output file, replace an existing "Docs:" section with newContent,
 * or insert it before the final UUID/Uuid section if none exists.
 *
 * Returns the updated file content string.
 */
function replaceOrAddDocsSection(fileContent, newDocsContent) {
  const sepPattern = /\r?\n[ \t]*----[ \t]*\r?\n/;
  const joinSeparator = "\n\n----\n\n";

  const parts = fileContent.split(sepPattern).map((p) => p.trim());

  // Find the index of a part whose first non-whitespace line starts with "Docs:"
  const docsIdx = parts.findIndex((p) => /^\s*Docs:/m.test(p));

  if (docsIdx !== -1) {
    // Replace existing Docs section
    parts[docsIdx] = newDocsContent;
  } else {
    // Insert before the last part (typically the Uuid field)
    parts.splice(parts.length - 1, 0, newDocsContent);
  }

  return parts.join(joinSeparator) + "\n";
}

// -----------------------------------------------------------------------------
// Hopper import
// -----------------------------------------------------------------------------
function importHopper() {
  const inputPath = resolve(root, HOPPER_INPUT);
  const outputPath = resolve(root, HOPPER_OUTPUT);

  const inputContent = readFileSync(inputPath, "utf8");
  const outputContent = readFileSync(outputPath, "utf8");

  const sections = parseKirbySections(inputContent);
  if (!sections["Builder"]) {
    throw new Error(`No "Builder:" section found in ${HOPPER_INPUT}`);
  }

  const items = parseBuilderSection(sections["Builder"]);
  const entries = items.map(formatHopperEntry).join("\n");
  const docsBlock = `Docs:\n\n${entries}`;

  const updated = replaceOrAddDocsSection(outputContent, docsBlock);
  writeFileSync(outputPath, updated, "utf8");

  console.log(`Hopper: imported ${items.length} entries → ${HOPPER_OUTPUT}`);
}

// -----------------------------------------------------------------------------
// Dump import
// -----------------------------------------------------------------------------
function importDump() {
  const inputPath = resolve(root, DUMP_INPUT);
  const outputPath = resolve(root, DUMP_OUTPUT);

  const inputContent = readFileSync(inputPath, "utf8");
  const outputContent = readFileSync(outputPath, "utf8");

  const sections = parseKirbySections(inputContent);
  if (!sections["Builder"]) {
    throw new Error(`No "Builder:" section found in ${DUMP_INPUT}`);
  }

  const items = parseBuilderSection(sections["Builder"]);
  const entries = items.map(formatDumpEntry).join("\n");
  const docsBlock = `Docs:\n\n${entries}`;

  const updated = replaceOrAddDocsSection(outputContent, docsBlock);
  writeFileSync(outputPath, updated, "utf8");

  console.log(`Dump: imported ${items.length} entries → ${DUMP_OUTPUT}`);
}

// -----------------------------------------------------------------------------
// Run both imports
// -----------------------------------------------------------------------------
importHopper();
importDump();
