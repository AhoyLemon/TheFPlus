import { readFile, writeFile } from "fs/promises";
import yaml from "js-yaml";

async function main() {
  const oldPath = "content_old/7-submit/3-hopper/hopper.txt";
  const newPath = "content/7_submit/3_hopper/hopper.txt";

  const oldRaw = await readFile(oldPath, "utf8");
  const newRaw = await readFile(newPath, "utf8");

  // extract the YAML list under "Builder:" from the old file
  const oldSection = oldRaw.replace(/^[\s\S]*?Builder:\s*/m, "");
  const oldItems = yaml.load(oldSection) as any;

  if (!Array.isArray(oldItems)) {
    console.error("Could not parse old builder items as an array");
    process.exit(1);
  }

  // ensure all subdates are plain YYYY-MM-DD strings (js-yaml converts them to
  // Date objects by default which then serialize to full ISO timestamps)
  for (const item of oldItems) {
    if (item && item.subdate instanceof Date) {
      item.subdate = item.subdate.toISOString().slice(0, 10);
    }
    // panel-generated records insist on storing a `_fieldset` value even though
    // it's not required; drop it so our script output matches the desired style.
    if (item && typeof item._fieldset !== "undefined") {
      delete item._fieldset;
    }
  }

  // dump the array back to YAML with 2-space indentation
  let builderYaml = yaml.dump(oldItems, {
    indent: 2,
    noRefs: true,
    // prevent long URLs from folding into block style; keep them quoted inline
    lineWidth: -1,
  });

  // post-process YAML to eliminate unnecessary block scalars where the value
  // doesn't contain actual line breaks.  the panel output usually keeps single-
  // line strings in quotes instead of using | or >.
  builderYaml = builderYaml.replace(/^([ \t]*)([a-zA-Z0-9_]+):\s*[|>]\n\s+([^\n]+)$/gm, "$1$2: '$3'");

  // replace the Documents section in the new file
  const updated = newRaw.replace(/(Documents:\s*\n)([\s\S]*?)(\n----)/, `$1${builderYaml}$3`);

  if (updated === newRaw) {
    console.log("no change needed; documents section already up to date");
  } else {
    await writeFile(newPath, updated, "utf8");
    console.log("Documents section replaced with old data");
  }
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
