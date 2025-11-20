<footer class="mt-auto py-4 text-center border-top text-muted" style="margin-top: 5rem !important;">
            <div class="container">
                <small>
                    &copy; <?= date('Y') ?> <strong>Cyber University</strong>. All rights reserved.
                    <span class="mx-1">|</span>
                    Dikembangkan oleh Talitha Khansa
                </small>
            </div>
        </footer>

    </div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
</script>

</body>
</html>