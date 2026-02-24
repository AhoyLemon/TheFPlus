import { spawn, type ChildProcess } from "child_process";
import chalk from "chalk";
import path from "path";
import { fileURLToPath } from "url";

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const root = path.resolve(__dirname, "..");

// ─── Helper ─────────────────────────────────────────────────────────────────
function run(cmd: string, args: string[]): Promise<boolean> {
  return new Promise((resolve) => {
    const proc: ChildProcess = spawn(cmd, args, {
      cwd: root,
      shell: true,
      stdio: ["ignore", "inherit", "pipe"],
    });

    let errOutput = "";
    proc.stderr?.on("data", (d: Buffer) => {
      errOutput += d.toString();
    });

    proc.on("close", (code) => {
      if (code !== 0 && errOutput) process.stderr.write(chalk.red(errOutput));
      resolve(code === 0);
    });
  });
}

// ─── Sass entry points ──────────────────────────────────────────────────────
const sassEntries: [string, string][] = [
  ["assets/sass/thefplus.scss", "assets/css/thefplus.css"],
  ["assets/sass/issues.scss", "assets/css/issues.css"],
  ["assets/sass/logo.scss", "assets/css/logo.css"],
  ["assets/sass/merch.scss", "assets/css/merch.css"],
  ["assets/sass/panel.scss", "assets/css/panel.css"],
  ["assets/sass/shirt.scss", "assets/css/shirt.css"],
  ["assets/sass/stan.scss", "assets/css/stan.css"],
  ["assets/sass/stats.scss", "assets/css/stats.css"],
  ["assets/sass/sticker-boxes.scss", "assets/css/sticker-boxes.css"],
  ["assets/sass/stickers.scss", "assets/css/stickers.css"],
];

// ─── Build ───────────────────────────────────────────────────────────────────
console.log("");
console.log(chalk.yellow.bold("  Building The F Plus assets for production..."));
console.log("");

// Sass: compile all files together
const sassArgs = sassEntries.flatMap(([src, dest]) => [`${src}:${dest}`]);
sassArgs.push("--no-source-map", "--style=compressed");

process.stdout.write(chalk.dim("  Compiling Sass..."));
const sassOk = await run("bunx", ["sass", ...sassArgs]);
console.log(sassOk ? chalk.green(" ✓") : chalk.red(" ✗"));

if (!sassOk) {
  console.log(chalk.red("  Sass build failed!"));
  process.exit(1);
}

// TypeScript: bundle with bun
process.stdout.write(chalk.dim("  Bundling TypeScript..."));
const tsResult = await Bun.build({
  entrypoints: [path.resolve(root, "assets/js/src/thefplus.ts")],
  outdir: path.resolve(root, "assets/js"),
  naming: "thefplus.min.js",
  target: "browser",
  minify: true,
  sourcemap: "none",
});

if (tsResult.success) {
  console.log(chalk.green(" ✓"));
} else {
  console.log(chalk.red(" ✗"));
  tsResult.logs.forEach((log) => console.log(chalk.red("   ", String(log))));
  process.exit(1);
}

// Output sizes
const cssFile = Bun.file(path.resolve(root, "assets/css/thefplus.css"));
const jsFile = Bun.file(path.resolve(root, "assets/js/thefplus.min.js"));
const cssSize = ((await cssFile.arrayBuffer()).byteLength / 1024).toFixed(1);
const jsSize = ((await jsFile.arrayBuffer()).byteLength / 1024).toFixed(1);

console.log("");
console.log(chalk.green("  ✓ Build complete!"));
console.log(chalk.dim(`    thefplus.css   ${cssSize} kB`));
console.log(chalk.dim(`    thefplus.min.js ${jsSize} kB`));
console.log("");
