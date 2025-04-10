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
    window.appConfig = {
        csrfToken: "{{ csrf_token() }}",
        orderStoreUrl: "{{ route('orders.store') }}"
    };
    function showModal(jasaId, jasaName, customerId) {
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
                selectOverlap: false, // mencegah seleksi bertabrakan dengan event
                events: function(fetchInfo, successCallback, failureCallback) {
                    fetch(`{{ route('orders.events') }}?jasa_id=${jasaId}&customer_id=${customerId}`, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(events => successCallback(events))
                    .catch(err => {
                        console.error('Gagal load event:', err);
                        failureCallback(err);
                    });
                },
                select: function(info) {
                    const start = info.startStr;
                    const end = new Date(info.end);
                    const endStr = end.toISOString().split('T')[0];

                    fetch(window.appConfig.orderStoreUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json", // <-- ini penting agar Laravel tidak balas HTML redirect
                            "X-CSRF-TOKEN": window.appConfig.csrfToken
                        },
                        body: JSON.stringify({
                            jasa_id: jasaId,
                            customer_id: customerId,
                            start_date: start,
                            end_date: endStr
                        })
                    })
                    .then(res => {
                        if (!res.ok) {
                            throw new Error("Respon tidak valid (bukan JSON). Status: " + res);
                        }
                        return res.json();
                    })
                    .then(res => {
                        alert('Booking berhasil!\nOrder ID: ' + res.order_id);
                    })
                    .catch(err => {
                        alert('Terjadi kesalahan saat booking.');
                        console.error(err);
                    });
                },
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