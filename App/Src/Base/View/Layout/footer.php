    <footer class="footer">
        <div class="container">
            <p class="text-muted">Place sticky footer content here.</p>
        </div>
    </footer>

    <script src="http://<?php echo APP_HOST; ?>/public/js/bootstrap.min.js"></script>
    <script src="http://<?php echo APP_HOST; ?>/public/js/main.js"></script>
    <script>
        APP_HOST = '<?php echo APP_HOST; ?>';
        BASE_URL = 'http://' + APP_HOST;
    </script>
    <?php foreach($scripts as $url): ?>
        <script src="<?php echo $url ?>"></script>
    <?php endforeach; ?>
</body>
</html>