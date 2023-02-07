  <h1 class="h3 mb-0 text-gray-800" style="text-align: center">JADWAL</h1>

  <div class="container-fluid">

      <div class="calender-area mg-b-15">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="calender-inner">
                          <div id='calendar'></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <script type="text/javascript">
          $(function() {

              var todayDate = moment().startOf('day');
              var YM = todayDate.format('YYYY-MM');
              var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
              var TODAY = todayDate.format('YYYY-MM-DD');
              var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

              $('#calendar').fullCalendar({
                  header: {
                      left: 'prev,next today',
                      center: 'title',
                      right: 'month,agendaWeek,agendaDay,listWeek'
                  },
                  editable: true,
                  eventLimit: true, // allow "more" link when too many events
                  navLinks: true,
                  backgroundColor: '#1f2e86',
                  eventTextColor: '#1f2e86',
                  textColor: '#378006',
                  dayClick: function(date, jsEvent, view) {
                      alert('Clicked on: ' + date.format());
                      alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                      alert('Current view: ' + view.name);

                      // change the day's background color just for fun
                      $(this).css('background-color', 'red');

                  },
                  events: [

                      <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM Pembayaran
                                                LEFT JOIN Booking ON pembayaran.id_booking=booking.id_booking
                                                LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan
                                                LEFT JOIN Lapangan ON booking.id_lapangan=lapangan.id_lapangan");
                        $no = 0;
                        if ($sql) {
                            while ($result = mysqli_fetch_array($sql)) {
                                $tgl1 = $result['tgl_main'];
                                $tgl = new DateTime($tgl1);
                                $sekarang = new DateTime();

                                $perbedaan = $tgl->diff($sekarang);
                        ?> {
                                  title: '<?php echo $result['nm_lengkap'] . "-" . $result['jam_main'] . "-" . $result['durasi'] ?>',
                                  start: todayDate.clone().add(<?php echo $perbedaan->d ?>, 'day').format('YYYY-MM-DD'),
                                  color: '#f3c30b'
                              },
                      <?php
                                $no++;
                            }
                        }
                        ?>
                  ]
              });
          });
      </script>