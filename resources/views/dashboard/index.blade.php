@extends('layouts.layout')

@section('head.title', 'Dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>150</h3>

                <p>Total opened bugs</p>
            </div>
            <div class="icon">
                <i class="fa fa-plus"></i>
            </div>
            <a href="{{ url('bugs') }}?status=opened" class="small-box-footer">See the list <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>15590</h3>

                <p>Total closed bugs</p>
            </div>
            <div class="icon">
                <i class="fa fa-check"></i>
            </div>
            <a href="{{ url('bugs') }}?status=closed" class="small-box-footer">See the list <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>139299</h3>

                <p>Total bugs</p>
            </div>
            <div class="icon">
                <i class="fa fa-exclamation"></i>
            </div>
            <a href="{{ url('bugs') }}?status=all" class="small-box-footer">See the list <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Assigned to me</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item" style="border-top: 0; padding-top: 0">
                        <div class="pull-right text-right">
                            <i class="fa fa-comments"></i> 0
                            <p>last updated at 2015-12-09 13:54:16</p>
                        </div>
                        <a href="http://localhost:8000/bugs/3" class="bold">Candidatura com problema</a>
                        <p>#3 opened in 2015-12-09 11:53:57 by Ricardo Quintanilha</p>
                    </li>
                                    <li class="list-group-item">
                        <div class="pull-right text-right">
                            <i class="fa fa-comments"></i> 0
                            <p>last updated at 2015-12-08 20:58:11</p>
                        </div>
                        <a href="http://localhost:8000/bugs/2" class="bold">Candidatura com problema</a>
                        <p>#2 opened in 2015-12-08 20:58:11 by Root</p>
                    </li>
                            </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Recent activities</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <ul class="timeline">

                    <li class="time-label">
                        <span>
                            Today
                        </span>
                    </li>

                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-check"></i>
                        <div class="timeline-item">
                            <span class="time">about 1 hour ago</span>

                            <h3 class="timeline-header" style="border:0"><a href="#">Root </a> closed bug <a href="">#1</a></h3>

                            <div class="timeline-body">
                                Usuário não consegue fazer busca
                            </div>
                        </div>
                    </li>

                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-exclamation"></i>
                        <div class="timeline-item">
                            <span class="time">about 2 hours ago</span>

                            <h3 class="timeline-header" style="border:0"><a href="#">Ricardo Quintanilha</a> opened bug <a href="">#1</a></h3>

                            <div class="timeline-body">
                                Usuário não consegue fazer busca
                            </div>
                        </div>
                    </li>

                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-comments"></i>
                        <div class="timeline-item">
                            <span class="time">about 2 days ago</span>

                            <h3 class="timeline-header" style="border:0"><a href="#">João</a> commented bug <a href="">#1</a></h3>

                            <div class="timeline-body">
                                Você conseguiu simular o problema novamente?
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bugs at last 7 days</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <p class="text-center">
                    <strong>05 Dez, 2015 - 11 Dez, 2015</strong>
                </p>

                <div class="chart">
                    <canvas id="bugs-by-period-chart"></canvas>
                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> 17%</span>
                            <h5 class="description-header">40</h5>
                            <span class="description-text">OPENED</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="description-block">
                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 5%</span>
                            <h5 class="description-header">5</h5>
                            <span class="description-text">CLOSED</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bugs by product</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="bugs-by-product-chart"></canvas>
                </div>
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Busca de Currículos (70)</li>
                    <li><i class="fa fa-circle-o text-green"></i> Inclusão de Currículos</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Área do Candidato</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Interno Vagas</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Atende</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Busca de Vagas</li>
                  </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bugs by priority</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="bugs-by-priority-chart"></canvas>
                </div>
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> N1 (4)</li>
                    <li><i class="fa fa-circle-o text-green"></i> N2 (15)</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> N3 (56)</li>
                  </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @parent

    <script src="{{ url('/vendor/Chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('/js/dashboard/main.js') }}"></script>
@endsection
