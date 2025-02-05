<?php
include '../../../header.php';
?>

<!-- A -->
<!-- Bootstrap form to create a new article -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouvel article</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new article -->
            <form action="<?php echo ROOT_URL . '/api/articles/create.php' ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="libTitrArt" name="libTitrArt" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <div class="form-group">
                    <label for="creation_date">Date de création</label>
                    <input type="date" class="form-control" id="dtCreaArt" name="dtCreaArt" required>
                </div>
                <div class="form-group">
                    <label for="chapeau">Chapô</label>
                    <textarea class="form-control" id="libChapoArt" name="libChapoArt" maxlength="500" placeholder="500 caracteres max" required></textarea>
                </div>
                <div class="form-group">
                    <label for="libAccrochArt">Accroche paragraphe 1</label>
                    <input type="text" class="form-control" id="libAccrochArt" name="libAccrochArt" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <div class="form-group">
                    <label for="parag1Art">Paragraphe 1</label>
                    <textarea class="form-control" id="parag1Art" name="parag1Art" maxlength="1200" placeholder="1200 caracteres max" required></textarea>
                </div>
                <div class="form-group">
                <div class="form-group">
                    <label for="libSsTitr1Art">Sous-titre 1</label>
                    <input type="text" class="form-control" id="libSsTitr1Art" name="libSsTitr1Art" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <div class="form-group">
                    <label for="parag2Art">Paragraphe 2</label>
                    <textarea class="form-control" id="parag2Art" name="parag2Art" maxlength="1200" placeholder="1200 caracteres max" rows="10" cols="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="libSsTitr2Art">Sous-titre 2</label>
                    <input type="text" class="form-control" id="libSsTitr2Art" name="libSsTitr2Art" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <div class="form-group">
                    <label for="parag3Art">Paragraphe 3</label>
                    <textarea class="form-control" id="parag3Art" name="parag3Art" maxlength="1200" placeholder="1200 caracteres max" required></textarea>
                </div>
                <div class="form-group">
                    <label for="libConclArt">Conclusion</label>
                    <textarea class="form-control" id="libConclArt" name="libConclArt" maxlength="800" placeholder="800 caracteres max" required></textarea>
                </div>
                <div class="form-group">
                    <!-- liste déroulante pour sélectionner la thématique -->
                    <label for="numThem">Thématique</label>
                    <select class="form-control" id="numThem" name="numThem" required>
                        <?php
                        $themes = sql_select('THEMATIQUE', 'numThem, libThem', '1');
                        foreach ($themes as $theme) {
                            echo '<option value="' . $theme['numThem'] . '">' . $theme['libThem'] . '</option>';
                        }
                        ?>
                </div>
                <!-- Upload de l'image -->
                <div class="form-group">
                    <label for="urlPhotArt">Image d’illustration</label>
                    <input type="file" class="form-control-file" id="urlPhotArt" name="urlPhotArt" accept="image/*" required>
                </div>
                <!-- Dual Listbox pour les mots clés -->
                <div class="form-group">
                    <label for="keywords">Mots clés</label>
                    <div class="dual-listbox-container d-flex">
                        <select id="available-keywords" class="form-control" multiple size="8" style="width: 45%;">
                            <?php
                            $keywords = sql_select('MOTCLE', 'numMotCle, libMotCle', '1');
                            foreach ($keywords as $keyword) {
                                echo '<option value="' . $keyword['numMotCle'] . '">' . $keyword['libMotCle'] . '</option>';
                            }
                            ?>
                        </select>
                        <div class="d-flex flex-column align-items-center justify-content-center mx-2">
                            <button type="button" class="btn btn-primary mb-2" onclick="moveKeywords('available-keywords', 'selected-keywords')">→</button>
                            <button type="button" class="btn btn-primary" onclick="moveKeywords('selected-keywords', 'available-keywords')">←</button>
                        </div>
                        <select id="selected-keywords" name="selectedKeywords[]" class="form-control" multiple size="8" style="width: 45%;">
                            <!-- Les mots clés sélectionnés iront ici -->
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Confirmer</button>
            </form>
        </div>
    </div>
</div>

<script>
    function moveKeywords(fromId, toId) {
        const fromList = document.getElementById(fromId);
        const toList = document.getElementById(toId);
        const selectedOptions = Array.from(fromList.selectedOptions);

        selectedOptions.forEach(option => {
            toList.appendChild(option);
        });
    }
</script>
