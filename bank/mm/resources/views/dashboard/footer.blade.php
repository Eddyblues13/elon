<!-- Bottom Navigation Bar -->
<nav class="navbar fixed-bottom navbar-light bg-light border-top">
    <div class="container-fluid d-flex justify-content-around">
        <a href="{{route('dashboard')}}" class="navbar-brand text-center text-primary">
            <i class="bi bi-person-badge fs-4 text-primary"></i>
            <span class="d-block">Dashboard</span>
        </a>
        <a href="{{route('inter.bank.transfer')}}" class="navbar-brand text-center text-primary ">
            <i class="bi bi-bank fs-4"></i>
            <span class="d-block">Transfer</span>
        </a>
        <a href="{{route('card')}}" class="navbar-brand text-center text-primary">
            <i class="bi bi-credit-card fs-4"></i>
            <span class="d-block">Virtual Card</span>
        </a>
        <a href="{{route('logOut')}}" class="navbar-brand text-center text-primary">
            <i class="bi bi-clock-history fs-4 text-primary"></i>
            <span class="d-block">Logout</span>
        </a>
    </div>
</nav>
<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">

</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->
<form action="{{route('make.loan')}}" method="POST">
    @csrf
    <div class="modal fade" id="reqLoan">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request Loan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="loan_response"></div>
                    <div class="mb-3">
                        <div class="input-group mb-3">

                            <input type="number" name="amount" class="form-control" placeholder="5000 USD" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">

                            <input type="number" name="ssn" class="form-control" placeholder="SSN" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Request Now</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function() {
            var options = {
                whatsapp: "+14582554024", // WhatsApp number
                call_to_action: "Reach-out on Whatsapp", // Call to action
                position: "left", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol,
                host = "getbutton.io",
                url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function() {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
</script>
<!-- /GetButton.io widget -->
<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Datatable -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/deznav-init.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--<script src="js/styleSwitcher.js"></script>-->
<script src="{{asset('js/app/app.js')}}"></script>

<script>
    (function($) {
            var table = $('#example5').DataTable({
                searching: false,
                paging: true,
                select: false,
                //info: false,         
                lengthChange: false

            });
            $('#example tbody').on('click', 'tr', function() {
                var data = table.row(this).data();

            });
        })(jQuery);
</script>


</body>

</html>