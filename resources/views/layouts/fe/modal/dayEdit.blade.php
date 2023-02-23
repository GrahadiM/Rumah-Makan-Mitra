
        <!-- Modal Hari -->
        <div class="modal fade" id="hari" tabindex="-1" aria-labelledby="Jam" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="Jam">Order Min H-1</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @if (\Setting::getDay() == NULL)
                        <form class="modal-body row" action="{{ route('fe.post_catering') }}" method="POST">
                    @else
                        <form class="modal-body row" action="{{ route('fe.update_catering') }}" method="POST">
                        @method('PUT')
                    @endif
                    {{-- <form class="modal-body row" action="{{ route('fe.post__catering') }}" method="POST"> --}}
                        @csrf

                        <input type="hidden" name="type" value="katering">
                        <div class="col-11">
                            <input type="datetime-local" name="tgl_pesanan" id="datetime-local" class="form-control datetimepicker" min="today_min" value="{{ \Setting::getDay() == NULL ? 'today_min' : $tgl_pesanan }}">
                        </div>
                        <!-- <span class="validity"></span> -->
                        <button type="submit" class="btn btn-outline-primary col-1"><i class="fas fa-check"></i></button>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://momentjs.com/downloads/moment.min.js"></script>
        <script src="https://momentjs.com/downloads/moment-timezone-with-data-10-year-range.min.js"></script>
        <!-- <script>
            $(document).ready(function(){
                var d = new Date().toISOString();
                d = moment.tz(d, "Asia/Jakarta").format();
                var minDate = d.substring(0, 11) + "00:00";
                console.log(minDate);
                $(".datetimepicker").attr({
                    "value" : minDate,
                    "min" : minDate,
                });
            });
        </script> -->
        <script>
            var today = new Date();
            var dd = today.getDate() + 1;
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            //
            var hh = today.getHours();
            var m = today.getMinutes();

            if (dd < 10)
            {
                dd = '0' + dd;
            }

            if (mm < 10)
            {
                mm = '0' + mm;
            }

            today_min = `${yyyy}-${mm}-${dd}T00:00`;
            value = {$tgl_pesanan};

            //or Year-Month-Day
            document.getElementById("datetime-local").setAttribute("min", today_min);
        </script>
        @if (\Setting::getDay() == NULL)
            <script>
                document.getElementById("datetime-local").setAttribute("value", today_min);
            </script>
        @else
            <script>
                document.getElementById("datetime-local").setAttribute("value", value);
            </script>
        @endif
