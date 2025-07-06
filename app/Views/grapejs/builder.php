<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Professional Page Builder</title>

  <!-- GrapesJS Core -->
  <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet"/>
  <script src="https://unpkg.com/grapesjs"></script>

  <!-- Custom Style -->
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    .gjs-block {
      border: 1px dashed #aaa;
      padding: 10px;
      margin-bottom: 10px;
      background: #f5f5f5;
      cursor: move;
    }
    #gjs {
      height: calc(100vh - 50px);
      width: 100%;
    }
    .top-panel {
      height: 50px;
      background-color: #222;
      color: #fff;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .top-panel button {
      background: #28a745;
      color: white;
      border: none;
      padding: 6px 10px;
      margin-left: 5px;
      cursor: pointer;
    }
    #blocks {
      position: fixed;
      top: 50px;
      left: 0;
      bottom: 0;
      width: 220px;
      background: #eee;
      overflow-y: auto;
      border-right: 1px solid #ccc;
      padding: 10px;
    }
    #gjs {
      margin-left: 220px;
    }
  </style>
</head>
<body>

  <!-- Top Bar -->
  <div class="top-panel">
    <div>🧱 <strong>Landing Page Builder</strong></div>
    <div>
      <button onclick="savePage()">💾 Save</button>
      <button onclick="editor.UndoManager.undo()">↩ Undo</button>
      <button onclick="editor.UndoManager.redo()">↪ Redo</button>
    </div>
  </div>

  <!-- Block Panel -->
  <div id="blocks"></div>

  <!-- Editor Canvas -->
  <div id="gjs">
    <h1>Selamat datang di builder profesional</h1>
    <p>Kamu bisa drag elemen dari kiri ke sini.</p>
  </div>

  <script>
    const editor = grapesjs.init({
      container: '#gjs',
      fromElement: true,
      height: '100%',
      width: 'auto',
      storageManager: false,
      blockManager: {
        appendTo: '#blocks'
      }
    });

    // Tambahkan blok-blok drag and drop
    editor.BlockManager.add('section', {
      label: '📦 Section',
      category: 'Layout',
      content: '<section><h2>Ini Section</h2><p>Isi konten di dalam section.</p></section>',
    });

    editor.BlockManager.add('text', {
      label: '📝 Teks',
      category: 'Basic',
      content: '<p>Teks biasa yang bisa diubah.</p>',
    });

    editor.BlockManager.add('image', {
      label: '🖼️ Gambar',
      category: 'Media',
      content: '<img src="https://via.placeholder.com/600x200" />',
    });

    editor.BlockManager.add('button', {
      label: '🔘 Tombol',
      category: 'Basic',
      content: '<button class="btn">Klik Saya</button>',
    });

    editor.BlockManager.add('2-columns', {
      label: '📐 2 Kolom',
      category: 'Layout',
      content: `
        <div class="row" style="display: flex;">
          <div style="flex: 1; padding: 10px;">Kolom 1</div>
          <div style="flex: 1; padding: 10px;">Kolom 2</div>
        </div>
      `
    });

    function savePage() {
      const html = editor.getHtml();
      const css = editor.getCss();

      fetch('<?= site_url("pagebuilder/save") ?>', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ html, css })
      })
      .then(res => res.json())
      .then(data => alert("✅ Halaman berhasil disimpan!"));
    }
  </script>
</body>
</html>
