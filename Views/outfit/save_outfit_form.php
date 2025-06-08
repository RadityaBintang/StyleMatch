<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StyleMatch - Save Outfit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body class="bg-light">

  <!-- Header -->
  <h1 class="text-center fw-bold mt-5 pt-4">StyleMatch</h1>

  <!-- Form Container -->
  <main class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="container">
      <div class="card shadow-sm rounded-3 mx-auto" style="max-width: 500px;">
        <div class="card-body px-4 py-4">
          <h5 class="text-center mb-2">Define Your Look</h5>
          <p class="text-center text-muted small mb-4">Add details to make your outfit easy to recognize and use.</p>

          <!-- Form -->
          <form action="index.php?c=Outfit&m=save" method="POST">

            <div class="mb-4">
              <label for="outfit-name" class="form-label">Outfit Name</label>
              <input type="text" class="form-control" id="outfit-name" name="outfit_name" placeholder="e.g., Monday Party, Sporty Vibes." required>
            </div>

            <div class="mb-5">
              <label for="outfit-desc" class="form-label">Outfit Description (Optional)</label>
              <input type="text" class="form-control" id="outfit-desc" name="outfit_desc" placeholder="Additional notes">
            </div>

            <!--select_outfit.php -->
            <div class="d-flex gap-3 mb-1 px-1">
              <a href="index.php?c=Outfit&m=select" class="btn btn-secondary flex-fill py-2">Cancel</a>
              <button type="submit" class="btn btn-primary flex-fill py-2">Submit</button>
            </div>
          </form>
          <!-- End Form -->

        </div>
      </div>
    </div>
  </main>
  
  </body>
</html>
