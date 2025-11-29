import fs from 'fs';
import path from 'path';

const src = path.resolve(process.cwd(), 'resources/assets/fonts/Peyda');
const dest = path.resolve(process.cwd(), 'public/fonts/Peyda');

function copyRecursive(srcDir, destDir) {
  if (!fs.existsSync(srcDir)) return;
  fs.mkdirSync(destDir, { recursive: true });
  const items = fs.readdirSync(srcDir, { withFileTypes: true });
  for (const item of items) {
    const srcPath = path.join(srcDir, item.name);
    const destPath = path.join(destDir, item.name);
    if (item.isDirectory()) {
      copyRecursive(srcPath, destPath);
    } else {
      try {
        fs.copyFileSync(srcPath, destPath);
      } catch (e) {
        // ignore copy errors
      }
    }
  }
}

copyRecursive(src, dest);
console.log('Copied Peyda fonts to public/fonts/Peyda (if present)');
