const inputTitle = document.querySelector('#title');
const inputSlug = document.querySelector('#slug');

title.addEventListener('change', function() {
    fetch(`/dashboard/posts/checkSlug?title=${inputTitle.value}`)
        .then(response => response.json())
        .then(response => inputSlug.value = response.slug)
    // response bentuknya array asosiatif(cek di DashboardPostController.php)

    // flow slug
    // 1. fetch ke url /dashboard/posts/checkSlug dengan parameter title
    // 2. url diterima oleh Route yg sesuai di web.php (Route::get('/dashboard/posts/checkSlug'))
    // 3. Route memanggil method checkSlug milik DashboardPostController
    // 4. method checkSlug mengembalikan response dalam bentuk json string seperti {slug: isi slug}
    // 5. response diubah ke bentuk json, kemudian isi slugnya diinputkan ke inputSlug secara otomatis
});