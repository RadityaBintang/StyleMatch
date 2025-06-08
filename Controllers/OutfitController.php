<?php

require_once 'models/save.php';

function setSession($key, $value) {
    $_SESSION[$key] = $value;
}

function getSession($key) {
    return $_SESSION[$key] ?? null;
}

function removeSession($key) {
    unset($_SESSION[$key]);
}

class OutfitController {
    private $saveModel;

    public function __construct() {
        $this->saveModel = new Save();
    }

    public function select() {
        try {
            $tops = $this->saveModel->getTops('Casual');
            $bottoms = $this->saveModel->getBottoms('Casual');

            $data = ['tops' => $tops, 'bottoms' => $bottoms];
            extract($data);
            require 'views/outfit/select_outfit.php';

        } catch (Exception $e) {
            require 'views/outfit/select_outfit.php';
        }
    }

    public function selectItem() {
        if (isset($_POST['item_type']) && isset($_POST['item_id'])) {
            $itemType = $_POST['item_type'];
            $itemId = $_POST['item_id'];

            if ($itemType === 'top') {
                setSession('selected_top', $itemId);
            } elseif ($itemType === 'bottom') {
                setSession('selected_bottom', $itemId);
            }

            echo json_encode(['success' => true]);
            exit;
        }

        echo json_encode(['success' => false]);
        exit;
    }

    public function saveForm() {
        $selectedTopId = getSession('selected_top');
        $selectedBottomId = getSession('selected_bottom');

        if ($selectedTopId && $selectedBottomId) {
            $top = $this->saveModel->getTopById($selectedTopId);
            $bottom = $this->saveModel->getBottomById($selectedBottomId);

            $data = ['selected_top' => $top, 'selected_bottom' => $bottom];
            extract($data);
            require 'views/outfit/save_outfit_form.php';
        } else {
            header('Location: index.php?c=Outfit&m=select');
            exit;
        }
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['outfit_name'] ?? '';
            $desc = $_POST['outfit_desc'] ?? '';
            $topId = getSession('selected_top');
            $bottomId = getSession('selected_bottom');

            if (!$topId || !$bottomId) {
                header('Location: index.php?c=Outfit&m=select');
                exit;
            }

            $saved = $this->saveModel->saveOutfit($name, $desc, $topId, $bottomId);

            if ($saved) {
                removeSession('selected_top');
                removeSession('selected_bottom');
                header('Location: index.php?c=Outfit&m=savedOutfits');
                exit;
            } else {
                header('Location: index.php?c=Outfit&m=saveForm');
                exit;
            }
        }
    }

 public function savedOutfits() {
    require_once 'Models/Save.php';
    $saveModel = new Save();

    $outfitsRaw = $saveModel->getSavedOutfitsByCategory();
    $outfits = [];

    foreach ($outfitsRaw as $outfit) {
        if (isset($outfit['top_id'], $outfit['bottom_id'], $outfit['name'])) {
            $top = $saveModel->getTopById($outfit['top_id']);
            $bottom = $saveModel->getBottomById($outfit['bottom_id']);

            $outfits[] = [
                'id' => $outfit['id'],
                'name' => $outfit['name'],
                'description' => $outfit['description'],
                'top' => $top,
                'bottom' => $bottom
            ];
        }
    }

    include 'views/outfit/saved_outfits.php';
}



    public function deleteOutfit() {
        if (isset($_GET['id'])) {
            $this->saveModel->deleteOutfit($_GET['id']);
        }
        header('Location: index.php?c=Outfit&m=savedOutfits');
        exit;
    }
}
