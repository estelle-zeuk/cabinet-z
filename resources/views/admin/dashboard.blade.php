@extends('layouts.backend.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        @if (Session::get('first'))
            <div class="alert alert-info alert-block" style="text-align: center;">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{__('message.user.welcome-to-admin-panel')}}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-dark text-white border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon-handbag icon-lg"></i>
                            <div class="ml-4">
                                <h4 class="font-weight-light">{{count($services)}} Services</h4>
                                <p class="mb-0 font-weight-light">{{count($publishedServices).' Publié'}}</p>
                                <p class="mb-0 font-weight-light">{{(count($services)-count($publishedServices)) .' Non Publié'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-primary text-white border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon-user icon-lg"></i>
                            <div class="ml-4">
                                <h4 class="font-weight-light">{{count($team)}} Membres </h4>
                                <p class="mb-0 font-weight-light">{{count($publishedTeam).' Publié'}}</p>
                                <p class="mb-0 font-weight-light">{{(count($team)-count($publishedTeam)) .' Non Publié'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-danger text-white border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon-screen-desktop icon-lg"></i>
                            <div class="ml-4">
                                <h4 class="font-weight-light">{{count(getTableInfo('product'))}} Articles</h4>
                                <h3 class="font-weight-light mb-3">{{count(getTableByAttribute('product','is_published','1'))}} Articles Publié</h3>
                                <p class="mb-0 font-weight-light">{{count(getTableByAttribute('product','is_published','0'))}} Articles Non Publié' </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-success text-white border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon-support icon-lg"></i>
                            <div class="ml-4">
                                <h4 class="font-weight-light">{{count(getTableInfo('appointment'))}} RDV</h4>
                                <h3 class="font-weight-light mb-3">{{count(getTableByAttribute('appointment','closed','0'))}} Ouverte</h3>
                                <p class="mb-0 font-weight-light">{{count(getTableByAttribute('appointment','closed','1'))}} Cloturer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List de Demande de RDV</h4>
                        <p class="text-muted font-weight-light">Vous avez {{count(getTableInfo('appointment'))}} demande de RDV</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="pt-1 pl-0">
                                        Name
                                    </th>
                                    <th class="pt-1">
                                        contact
                                    </th>
                                    <th class="pt-1">
                                        Date soliciter
                                    </th>
                                    <th class="pt-1">
                                        message
                                    </th>
                                    <th class="pt-1">
                                     Statut
                                    </th>
                                    <th class="pt-1">
                                        Details
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 0;  @endphp
                                @foreach(getTableInfo('appointment') as $appointment)
                                    <tr>
                                        <td class="py-1 pl-0">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-3">
                                                    <p class="mb-2">{{$appointment->name}}</p>
                                                    <p class="mb-0 text-muted text-small">{{$appointment->phone}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{$appointment->phone}}
                                        </td>
                                        <td>
                                            {{date('Y-m-d H:i:s',strtotime($appointment->date))}}
                                        </td>
                                        <td style="width: 200px;">
                                            {{substr($appointment->message,0,65).'...'}}
                                        </td>
                                        <td style="width: 200px;">
                                            @if($appointment->closed == 0) Ouvert @else Cloturer @endif
                                        </td>
                                        <td style="width: 200px;">
                                            <a href="{{$appointment->message}}" name="{{$appointment->name}}" style="color: #fff;" class="add btn btn-primary todo-list-add-btn enquiries-show">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Enquiries</h4>
                            <p class="text-muted font-weight-light">You have {{count($enquiries)}} Enquiries sent</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pt-1 pl-0">
                                            Name
                                        </th>
                                        <th class="pt-1">
                                            contact
                                        </th>
                                        <th class="pt-1">
                                            message
                                        </th>
                                        <th class="pt-1">
                                            Details
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i = 0; @endphp
                                    @foreach($enquiries as $enquiry)
                                        <tr>
                                            <td class="py-1 pl-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="ml-3">
                                                        <p class="mb-2">{{$enquiry->name}}</p>
                                                        <p class="mb-0 text-muted text-small">{{$enquiry->email}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{$enquiry->phone}}
                                            </td>
                                            <td style="width: 200px;">
                                                {{substr($enquiry->message,0,65).'...'}}
                                            </td>
                                            <td style="width: 200px;">
                                                <a href="{{$enquiry->message}}" name="{{$enquiry->name}}" style="color: #fff;" class="add btn btn-primary todo-list-add-btn enquiries-show">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <script>
        $(function () {
            issueChart($("#issues-chart"));
            var processingLoader = $('#processing');
            /* swal({
                 title: 'Now loading',
                 allowEscapeKey: false,
                 allowOutsideClick: false,
             });*/

            $(document).on('click', '.enquiries-show', function (event) {
                var message = $(this).attr('href');
                var name = $(this).attr('name');
                swal({
                    title: 'Message from '+name,
                    text: message,
                    button: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary"
                    }
                })
            });

            $(document).on('click', '.volunteer-show', function (event) {
                event.preventDefault();
                var message = $(this).attr('reason');
                swal({
                    title: 'Volunteer reason',
                    text: message,
                    button: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary"
                    }
                })
            });

            $(document).on('click', '.approval', function (event) {
                event.preventDefault();
                var href = $(this).attr('href');
                volunteerAjax(href);
            });

            $(document).on('click', '.disapproval', function (event) {
                event.preventDefault();
                var href = $(this).attr('href');
                volunteerAjax(href);
            });
            function volunteerAjax(url) {
                processingLoader.show();
                $.ajax({
                    type:'get',
                    url:url,
                    success: function (data) {
                        processingLoader.hide();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            button: {
                                text: "Continue",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        }).then(function () {
                            location.reload();
                        })
                    },error:function (xhr) {
                        processingLoader.hide();
                        swal({
                            title: 'Error!',
                            text: xhr.responseJSON.message,
                            icon: 'error',
                            button: {
                                text: "Continue",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        }).then(function () {
                            location.reload();
                        })
                    }
                });
            }

            function updateContribution(amount,url,donor) {
                processingLoader.show();
                $.ajax({
                    type:'get',
                    url:url+'/'+amount,
                    success: function (data) {
                        processingLoader.hide();
                        swal({
                            title: 'Success!',
                            text: data.message+' under '+donor+'!',
                            icon: 'success',
                            button: {
                                text: "Continue",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        }).then(function () {
                            location.reload();
                        })
                    },error:function (xhr) {
                        processingLoader.hide();
                        swal({
                            title: 'Error!',
                            text: xhr.message,
                            icon: 'danger',
                            button: {
                                text: "Continue",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        })
                    }
                });
            }

            function issueChart(id){
                if (id.length) {
                    var issuesChartData = {
                        datasets: [{
                            data: [60, 30, 10],
                            backgroundColor: [
                                '#f3f6f9',
                                '#0766c6',
                                '#00b297'
                            ],
                            borderWidth: 0
                        }],

                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: [
                            'Closed',
                            'In progress',
                            'Open'
                        ]
                    };
                    var issuesChartOptions = {
                        responsive: true,
                        maintainAspectRatio: true,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                        legend: {
                            display: false
                        },
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul class="legend'+ chart.id +'">');
                            for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                                text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
                                if (chart.data.labels[i]) {
                                    text.push(chart.data.labels[i]);
                                }
                                text.push('<span class="legend-percentage ml-auto">'+ chart.data.datasets[0].data[i] + '%</span>');
                                text.push('</li>');
                            }
                            text.push('</ul>');
                            return text.join("");
                        },
                        cutoutPercentage: 70
                    };
                    var issuesChartCanvas = $("#issues-chart").get(0).getContext("2d");
                    var issuesChart = new Chart(issuesChartCanvas, {
                        type: 'doughnut',
                        data: issuesChartData,
                        options: issuesChartOptions
                    });
                    document.getElementById('issues-chart-legend').innerHTML = issuesChart.generateLegend();
                }
            }
        });
    </script>
@endsection
