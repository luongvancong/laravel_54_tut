                </div>
            </div>
        </div>
        <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/assets/css/bs3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/assets/js/tinymce/tinymce.min.js"></script>

        <script type="text/javascript">
            $(function() {
                tinymce.init({
                    selector: '.editor',
                    height: 300,
                    theme: 'modern',
                    plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
                    ],
                    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
                    image_advtab: true,
                    templates: [
                        { title: 'Test template 1', content: 'Test 1' },
                        { title: 'Test template 2', content: 'Test 2' }
                    ],
                    content_css: [
                        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                        '//www.tinymce.com/css/codepen.min.css'
                    ]
                });
            });
        </script>
    </body>
</html>