<?php
if (!isset($outfits) || !is_array($outfits)) {
    $outfits = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Outfits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .outfit-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .outfit-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }
        .outfit-card img {
            width: 100px;
            height: auto;
            margin: 10px;
            border-radius: 8px;
        }
        .buttons {
            margin-top: 10px;
        }
        .buttons a {
            margin: 0 5px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 6px 12px;
            border-radius: 5px;
        }
        .buttons a.delete {
            background-color: #DC3545;
        }
    </style>
</head>
<body>
    <div style="margin-bottom: 10px;">
        <a href="index.php?c=Outfit&m=index">&larr; Back</a>
        <a href="views/recommendation/index.php" style="
            display: inline-block;
            margin-left: 10px;
            text-decoration: none;
            background-color: #28A745;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
        ">Others</a>
    </div>

    <h2>Saved Outfit</h2>

    <div class="outfit-container">
        <?php foreach ($outfits as $outfit): ?>
            <div class="outfit-card">
                <h3><?= htmlspecialchars($outfit['name']) ?></h3>
                <p><?= htmlspecialchars($outfit['description']) ?></p>

                <div>
                    <?php if (!empty($outfit['top']) && is_array($outfit['top'])): ?>
                        <img src="<?= htmlspecialchars($outfit['top']['image_url']) ?>" alt="Top">
                        <p><strong>Top:</strong> <?= htmlspecialchars($outfit['top']['name']) ?></p>
                    <?php else: ?>
                        <p><strong>Top:</strong> Not found</p>
                    <?php endif; ?>
                </div>

                <div>
                    <?php if (!empty($outfit['bottom']) && is_array($outfit['bottom'])): ?>
                        <img src="<?= htmlspecialchars($outfit['bottom']['image_url']) ?>" alt="Bottom">
                        <p><strong>Bottom:</strong> <?= htmlspecialchars($outfit['bottom']['name']) ?></p>
                    <?php else: ?>
                        <p><strong>Bottom:</strong> Not found</p>
                    <?php endif; ?>
                </div>

                <div class="buttons">
                    <a href="#" class="edit">Edit</a>
                    <a href="index.php?c=Outfit&m=deleteOutfit&id=<?= $outfit['id'] ?>" class="delete">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
