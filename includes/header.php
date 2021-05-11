<header class="flex-row align-items-center plr-15">
    <div class="flex-row align-items-center">
        <button id="toggle-nav-bar" class="btn mr-5 bg-primary white p-5-10">
            <i style="font-size : 25px" class="fas fa-bars"></i>
        </button>
        <h3 class="secondary" style="font-family:cursive;">E-Code</h3>
    </div>
    <div></div>
</header>
<div class="header-padding"></div>

<div id="back-to-top">
    <div class="flex-row flex-center">
        <i class="fa fa-arrow-up"></i>
    </div>
</div>

<script>
    $('#toggle-nav-bar').click(() => {
        $('.nav-bar').toggle()
    })
</script>

<script>
	$('#back-to-top').click(() => {
        window.scrollTo(0,0)
	})
</script>

<script>
    window.onscroll = () => {
        let st = document.getElementById('back-to-top')
        if(window.scrollY > 150)
            st.style.display = 'block'
        else st.style.display = 'none'
    }
</script>