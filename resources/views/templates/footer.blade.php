<!-- footer Start -->
<footer>
    <div class="social">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
    </div>

    <div class="links">
        <a href="#home">Home</a>
        <a href="#about">about</a>
        <a href="#menu">Menu</a>
        <a href="#contact">contact</a>
    </div>

    <div class="credit">
        <p>Created By <a href="">Rio Saputra</a>. | &copy; 2024.</p>
    </div>
</footer>
<!-- footer End -->



<!-- featres icon -->
<script>
feather.replace();
</script>

<script>
    function showModal() {
        document.getElementById("modalFloating").style.display = "flex";
    
        // Cek apakah kalender sudah di-render, jika belum, render
        if (!document.getElementById("calendar").classList.contains("fc")) {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                initialView: 'dayGridMonth',
                buttonText: {
                    today: 'Hari Ini',     // <- ini yang mengganti tombol "today"
                    month: 'Bulan',
                    week: 'Minggu',
                    day: 'Hari',
                    list: 'Agenda'
                },
                dayHeaderFormat: { weekday: 'long' },
                selectable: true,
                select: function(info) {
                    const start = info.startStr;
                    const end = new Date(info.end);
                    const endStr = end.toISOString().split('T')[0];

                    alert('Tanggal mulai: ' + start + '\nTanggal selesai: ' + endStr);
                    // bisa ganti alert ini jadi munculin form booking
                }
            });
            calendar.render();
        }
    }
    
    function closeModal() {
        document.getElementById("modalFloating").style.display = "none";
    }
</script>  

<!-- My javascript -->
<script src="{{ asset('js/script.js') }}?v={{ time() }}"></script>
</body>

</html>