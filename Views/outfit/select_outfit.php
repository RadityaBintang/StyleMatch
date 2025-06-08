<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Outfit – Casual</title>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
          crossorigin="anonymous"></script>

  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    body{
      font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;
      background:#fff;color:#333;text-align:center
    }
    .container{max-width:420px;margin:0 auto;padding-bottom:88px}
    .section-title{font-size:16px;font-weight:600;padding:16px 20px 8px;text-align:left}
    .horizontal-scroll{
      display:flex;overflow-x:auto;gap:12px;padding:0 16px 20px;
      scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch
    }
    .horizontal-scroll::-webkit-scrollbar{display:none}
    .scroll-card{
      flex:0 0 100%;scroll-snap-align:start;
      border-radius:16px;overflow:hidden;background:#eee;
      box-shadow:0 4px 12px rgba(0,0,0,.08);height:240px;cursor:pointer;
      position:relative;transition:transform .15s
    }
    .scroll-card img{width:100%;height:100%;object-fit:cover;display:block}
    .selected{outline:3px solid #007bff;transform:scale(.96)}
    .btn-save{
      position:fixed;left:50%;bottom:24px;transform:translateX(-50%);
      padding:12px 32px;border:none;border-radius:8px;background:#0d6efd;color:#fff;
      font-weight:600;font-size:15px;cursor:pointer;box-shadow:0 2px 8px rgba(0,0,0,.15);
    }
  </style>
</head>
<body>

  <h1 style="margin:24px 0 8px;font-size:28px;font-weight:700">Casual</h1>

  <div class="container">
    <!-- ATASAN -->
    <div class="section-title">Atasan</div>
    <div class="horizontal-scroll">
      <?php foreach ($tops as $top): ?>
        <div class="scroll-card" data-id="<?= $top['id'] ?>" data-type="top">
          <img src="<?= $top['image_url'] ?>" alt="<?= htmlspecialchars($top['name']) ?>">
        </div>
      <?php endforeach; ?>
    </div>

    <!-- BAWAHAN -->
    <div class="section-title">Bawahan</div>
    <div class="horizontal-scroll">
      <?php foreach ($bottoms as $bottom): ?>
        <div class="scroll-card" data-id="<?= $bottom['id'] ?>" data-type="bottom">
          <img src="<?= $bottom['image_url'] ?>" alt="<?= htmlspecialchars($bottom['name']) ?>">
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- tombol save -->
  <button id="save-outfit-btn" class="btn-save">Save Outfit</button>

  <!-- SCRIPT -->
  <script>
    $(function () {
      $('.scroll-card').on('click', function () {
        const $card = $(this);
        const itemType = $card.data('type');
        const itemId = $card.data('id');

        // Hapus selected dari tipe yg sama
        $('.scroll-card[data-type="' + itemType + '"]').removeClass('selected');
        $card.addClass('selected');

        // Kirim via AJAX
        $.post('index.php?c=Outfit&m=selectItem', {
          item_type: itemType,
          item_id: itemId
        });
      });

      $('#save-outfit-btn').on('click', function () {
        const topSelected = $('.scroll-card[data-type="top"].selected').length > 0;
        const bottomSelected = $('.scroll-card[data-type="bottom"].selected').length > 0;

        if (!topSelected || !bottomSelected) {
          alert("Silakan pilih atasan dan bawahan terlebih dahulu.");
          return;
        }

        // Arahkan ke form simpan
        window.location.href = 'index.php?c=Outfit&m=saveForm';
      });
    });
  </script>

</body>
</html>
