<div class="btn" style="height: 50px;
    width: 50px;
    background: #9370DB;
    border-radius: 50%;
    color:white;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 1000;
    right: 20px;
    bottom: 20px;
    cursor: pointer;">
      ▲
</div>
<script>
const btn = document.querySelector('.btn');

btn.addEventListener('click', () => {

    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    })

})
</script>
</div>