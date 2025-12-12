</div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Logika Toggle Switch Theme
            $('#themeToggle').on('change', function() {
                window.location.href = "<?= base_url('theme/toggle') ?>";
            });
        });
    </script>
</body>
</html>