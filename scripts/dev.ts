import { spawn, type ChildProcess } from "child_process";
import { watch } from "chokidar";
import chalk from "chalk";
import path from "path";
import { fileURLToPath } from "url";

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const root = path.resolve(__dirname, "..");

const DEV_URL = "http://thefplus.test";

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

// ─── Sass compiler (dev: expanded + embedded source maps) ───────────────────
function compileSass(): Promise<boolean> {
  return new Promise((resolve) => {
    const args = sassEntries.flatMap(([src, dest]) => [`${src}:${dest}`]);
    // In dev: expanded style + embedded source maps so browser inspector
    // shows which Sass partial each rule comes from.
    args.push("--style=expanded", "--embed-sources");

    const proc: ChildProcess = spawn("bunx", ["sass", ...args], {
      cwd: root,
      shell: true,
      stdio: ["ignore", "ignore", "pipe"],
    });

    let errorOutput = "";
    proc.stderr?.on("data", (d: Buffer) => {
      errorOutput += d.toString();
    });

    proc.on("close", (code) => {
      if (code === 0) {
        console.log(chalk.green("  ✓ sass") + chalk.dim(" → assets/css/"));
        resolve(true);
      } else {
        console.log(chalk.red("  ✗ sass error:"));
        console.log(chalk.red(errorOutput));
        resolve(false);
      }
    });
  });
}

// ─── TypeScript bundler (dev: unminified + inline source maps) ───────────────
async function bundleTS(): Promise<boolean> {
  const result = await Bun.build({
    entrypoints: [path.resolve(root, "assets/js/src/thefplus.ts")],
    outdir: path.resolve(root, "assets/js"),
    naming: "thefplus.min.js",
    target: "browser",
    minify: false,
    sourcemap: "inline",
  });

  if (result.success) {
    console.log(chalk.green("  ✓ typescript") + chalk.dim(" → assets/js/thefplus.min.js"));
    return true;
  } else {
    console.log(chalk.red("  ✗ typescript error:"));
    result.logs.forEach((log) => console.log(chalk.red("   ", String(log))));
    return false;
  }
}

// ─── Initial build ────────────────────────────────────────────────────────────
console.log(chalk.yellow("\n  Building assets..."));
console.log("");

// Initial build
const [sassOk, tsOk] = await Promise.all([compileSass(), bundleTS()]);

if (!sassOk || !tsOk) {
  console.log(chalk.red("\n  Some builds failed. Fix the errors above and save to retry."));
} else {
  console.log(chalk.green("\n  Initial build complete!"));
}

// ─── Greeting ────────────────────────────────────────────────────────────────
console.log("");
console.log(chalk.red.bold("  ████████╗██╗  ██╗███████╗    ███████╗██████╗ ██╗     ██╗   ██╗███████╗"));
console.log(chalk.red.bold("     ██╔══╝██║  ██║██╔════╝    ██╔════╝██╔══██╗██║     ██║   ██║██╔════╝"));
console.log(chalk.red.bold("     ██║   ███████║█████╗      █████╗  ██████╔╝██║     ██║   ██║███████╗"));
console.log(chalk.red.bold("     ██║   ██╔══██║██╔══╝      ██╔══╝  ██╔═══╝ ██║     ██║   ██║╚════██║"));
console.log(chalk.red.bold("     ██║   ██║  ██║███████╗    ██║     ██║     ███████╗╚██████╔╝███████║"));
console.log(chalk.red.bold("     ╚═╝   ╚═╝  ╚═╝╚══════╝   ╚═╝     ╚═╝     ╚══════╝ ╚═════╝ ╚══════╝"));
console.log(chalk.dim("\n  Terrible Things Read With Enthusiasm\n"));
console.log(chalk.cyan.underline(DEV_URL));
console.log("");
console.log(chalk.dim("  Watching for changes... refresh the browser to see them. (Ctrl+C to stop)\n"));

let sassTimer: ReturnType<typeof setTimeout> | null = null;
let tsTimer: ReturnType<typeof setTimeout> | null = null;

// Watch Sass
watch(path.resolve(root, "assets/sass"), { ignoreInitial: true }).on("change", (filePath: string) => {
  console.log(chalk.dim(`  ↺  ${path.relative(root, filePath)}`));
  if (sassTimer) clearTimeout(sassTimer);
  sassTimer = setTimeout(() => compileSass(), 100);
});

// Watch TypeScript
watch(path.resolve(root, "assets/js/src"), { ignoreInitial: true }).on("change", (filePath: string) => {
  console.log(chalk.dim(`  ↺  ${path.relative(root, filePath)}`));
  if (tsTimer) clearTimeout(tsTimer);
  tsTimer = setTimeout(() => bundleTS(), 100);
});
