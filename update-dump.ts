import { readFile, writeFile } from "fs/promises";
import yaml from "js-yaml";

async function main() {
  const oldPath = "content_old/7-submit/2-dump/dump.txt";
  const newPath = "content/7_submit/2_dump/dump.txt";

  const oldRaw = await readFile(oldPath, "utf8");
  const newRaw = await readFile(newPath, "utf8");

  // pull the Builder section from the old file (these are the dumped items)
  const oldSection = oldRaw.replace(/^[\s\S]*?Builder:\s*/m, "");
  const oldItems = yaml.load(oldSection) as any;

  if (!Array.isArray(oldItems)) {
    console.error("Could not parse old builder items as an array");
    process.exit(1);
  }

  for (const item of oldItems) {
    if (item && item.rejectdate instanceof Date) {
      item.rejectdate = item.rejectdate.toISOString().slice(0, 10);
    }
    if (item && typeof item._fieldset !== "undefined") {
      delete item._fieldset;
    }
  }

  let builderYaml = yaml.dump(oldItems, {
    indent: 2,
    noRefs: true,
    lineWidth: -1,
  });

  builderYaml = builderYaml.replace(/^([ \t]*)([a-zA-Z0-9_]+):\s*[|>]\n\s+([^\n]+)$/gm, "$1$2: '$3'");

  // replace everything following the Builder: header to the end of the file
  // replace the Rejected-documents list in the new file
  const updated = newRaw.replace(/(Rejected-documents:\s*\n)([\s\S]*?)(\n----)/, `$1${builderYaml}$3`);

  // always write the file; replacement may have just rewritten identical
  // content, but we still want to normalise formatting and remove
  // `_fieldset` keys.
  await writeFile(newPath, updated, "utf8");
  console.log("Builder section rewritten (cleaned/merged)");
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
