let showMore = document.querySelector('#admin-control');
let userMore = document.querySelector('#user-more');
let icon = showMore.querySelector('i');
if (showMore) {
    showMore.onclick = () => {
        userMore.classList.toggle('hidden');
        if (icon.classList.contains('fa-caret-down')) {
            icon.classList.remove('fa-caret-down');
            icon.classList.add('fa-caret-up');
        } else {
            icon.classList.remove('fa-caret-up');
            icon.classList.add('fa-caret-down');
        }
    }
}