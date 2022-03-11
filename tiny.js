<script src="https://cdn.tiny.cloud/1/5dwaqhdh0acnv18ut7nam4u2n1l3y5tv2lr8ix75fdzpbnzp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<!DOCTYPE html>
<html>
    <head>
    </head>

        <script>
        tinymce.init({
            selector: 'textarea#tiny'
        });
        </script>

// Prevent Bootstrap dialog from blocking focusin document.addEventListener('focusin', (e) => {
  if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
    e.stopImmediatePropagation();
  }
});

</html>