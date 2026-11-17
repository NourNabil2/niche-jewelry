// Zero-dependency local development static HTTP server for Elise Paige Atelier
const http = require('http');
const fs = require('fs');
const path = require('path');
const url = require('url');

const PORT = process.env.PORT || 8080;
const PUBLIC_DIR = __dirname;

const MIME_TYPES = {
  '.html': 'text/html; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.js': 'text/javascript; charset=utf-8',
  '.mjs': 'text/javascript; charset=utf-8',
  '.json': 'application/json; charset=utf-8',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.svg': 'image/svg+xml',
  '.gif': 'image/gif',
  '.webp': 'image/webp',
  '.ico': 'image/x-icon',
  '.obj': 'text/plain',
  '.mtl': 'text/plain',
  '.glb': 'model/gltf-binary',
  '.gltf': 'model/gltf+json',
  '.woff': 'font/woff',
  '.woff2': 'font/woff2',
  '.ttf': 'font/ttf'
};

const server = http.createServer((req, res) => {
  let pathname;
  try {
    const parsedUrl = new URL(req.url, `http://${req.headers.host || 'localhost:8080'}`);
    pathname = decodeURIComponent(parsedUrl.pathname);
  } catch (e) {
    pathname = '/';
  }

  // Security check - prevent path traversal
  const safePath = path.normalize(pathname).replace(/^(\.\.[\/\\])+/, '');
  let filePath = path.join(PUBLIC_DIR, safePath);

  fs.stat(filePath, (err, stats) => {
    if (err) {
      res.writeHead(404, { 'Content-Type': 'text/plain; charset=utf-8' });
      res.end(`404 Not Found: ${pathname}`);
      return;
    }

    if (stats.isDirectory()) {
      filePath = path.join(filePath, 'index.html');
    }

    const ext = path.extname(filePath).toLowerCase();
    const contentType = MIME_TYPES[ext] || 'application/octet-stream';

    // CORS & Cache headers for local development
    const headers = {
      'Content-Type': contentType,
      'Access-Control-Allow-Origin': '*',
      'Cache-Control': 'no-cache'
    };

    fs.readFile(filePath, (readErr, data) => {
      if (readErr) {
        res.writeHead(500, { 'Content-Type': 'text/plain; charset=utf-8' });
        res.end(`500 Internal Server Error: ${readErr.message}`);
        return;
      }
      res.writeHead(200, headers);
      res.end(data);
    });
  });
});

server.listen(PORT, () => {
  console.log(`\n======================================================`);
  console.log(`✦ ELISE PAIGE FINE JEWELRY & 3D GLIDER ATELIER ✦`);
  console.log(`======================================================`);
  console.log(`  Local Server running at: http://localhost:${PORT}/`);
  console.log(`  - Landing Page:  http://localhost:${PORT}/index.html`);
  console.log(`  - 3D Customizer: http://localhost:${PORT}/customizer.html`);
  console.log(`  - Collections:   http://localhost:${PORT}/collections.html`);
  console.log(`  - Wishlist:      http://localhost:${PORT}/wishlist.html`);
  console.log(`  - Account:       http://localhost:${PORT}/account.html`);
  console.log(`======================================================\n`);
});
