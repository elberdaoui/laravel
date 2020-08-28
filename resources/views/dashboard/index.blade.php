@section('title', 'Dashboard')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

<!-- START: ecommerce/Pages-list -->
<section class="card">

    
    
    <div class="card-body">
    
        <table class="table table-hover nowrap" id="example1" width="100%">
            <thead class="thead-default">
            <tr>
                   <th>Picture</th>
                <th>Name</th>
                <th>LastName</th>
                <th>Email</th>
                <th>CIN</th>
                <th>telephone</th>
                <th>Ville</th>
                <th>Secteur</th>
                <th>User</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                  <th>Picture</th>
                <th>Name</th>
                <th>LastName</th>
                <th>Email</th>
                <th>CIN</th>
                <th>telephone</th>
                <th>Ville</th>
                <th>Secteur</th>
                <th>User</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($bricolers as $bricoler)
            <tr>
                <td><img width="100" height="100" src="{{asset('/storage/'.$bricoler->image)}}"></td>
                <td>{{ $bricoler->nom }}</td>
                <td>{{ $bricoler->prenom }}</td>
                <td>{{ $bricoler->email }}</td>
                <td>{{ $bricoler->CIN }}</td>
                <td>{{ $bricoler->telephone }}</td>
                <td>{{ App\Ville::find($bricoler->ville_id)->nom_ville }}</td>
                <td>{{ App\Secteur::find($bricoler->secteur_id)->nom_secteur }}</td>
                <td>{{ App\User::find($bricoler->user_id)->username }}</td>
            
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- END: ecommerce/products-list -->
<script>
    $('#id').delay(3000).fadeOut('fast');
</script>
<!-- START: page scripts -->
<script>
    $(function () {

        // Datatables
        $('#example1').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25,50, 100, 200, "All"]],
            responsive: true,
            "autoWidth": false
        });

    })
</script>
<!-- END: page scripts -->
<!-- END: page scripts -->
<!-- START: page scripts -->
<script>
    $( function() {
        $("#m_section_name").html("Dashboard");
        ///////////////////////////////////////////////////////////
        // tooltips
        $("[data-toggle=tooltip]").tooltip();

        ///////////////////////////////////////////////////////////
        // chart1
        new Chartist.Line(".chart-line", {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            series: [
                [5, 0, 7, 8, 12],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: !0,
            chartPadding: {
                right: 40
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });

        ///////////////////////////////////////////////////////////
        // chart 2
        var overlappingData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                overlappingOptions = {
                    seriesBarDistance: 10,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                },
                overlappingResponsiveOptions = [
                    ["", {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0]
                            }
                        }
                    }]
                ];

        new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);

        ///////////////////////////////////////////////////////////
        // custom scroll
        if (!('ontouchstart' in document.documentElement) && jQuery().jScrollPane) {
            $('.custom-scroll').each(function() {
                $(this).jScrollPane({
                    contentWidth: '100%',
                    autoReinitialise: true,
                    autoReinitialiseDelay: 100
                });
                var api = $(this).data('jsp'),
                        throttleTimeout;
                $(window).bind('resize', function() {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(function() {
                            api.reinitialise();
                            throttleTimeout = null;
                        }, 50);
                    }
                });
            });
        }

    } );
</script>
<!-- END: page scripts -->
@include('components/footer')

