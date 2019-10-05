<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Software Inventory</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrapcss/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/History.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Acceuil.css')}}">
    <link href="{{asset('/Fontawesome/css/all.css')}}" rel="stylesheet">
    <script src="{{asset('/js/bootstrapjs/bootstrap.js')}}" ></script>


</head>
<nav>
    @include('Navigation')
</nav>
<body>
<div class="container">
    <div class="page-header">
        <h4 style="margin-top: 3%;font-weight: bold;font-family: 'Segoe UI',sans-serif;padding-bottom:6px;border-bottom-style:solid;border-color:#54AFED;font-size: 30px;">Historique de : {{$app->first()->nom}} </h4><br>

    </div>
    <div id="timeline">
        <div class="row timeline-movement timeline-movement-top">
            <div class="timeline-badge timeline-filter-movement">
                <a href="#">
                    <i class="far fa-clock fa-lg"></i>
                </a>
            </div>

        </div>
        @for($i = $i-1;$i>=2;$i--)
        <div class="row timeline-movement">

            <div class="timeline-badge">
                <div class="Text-Ver">
                    <span class="timeline-balloon-date-day"><strong>{{date('j F',strtotime($ap[$i]->DDM))}}</strong></span>
                </div>
            </div>


            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="timeline-panel credits"style="display:{{$left}} ">
                            <ul class="timeline-panel-ul">
                                @if($ap[$i]->nom!=$ap[$i-1]->nom)<li><span class="causale"><span style="font-weight: bold">Nom : </span>{{$ap[$i]->nom}}</span> </li>@endif
                                @if($ap[$i]->Nver!=$ap[$i-1]->Nver)<li><span class="causale"><span style="font-weight: bold">N° Version :</span>{{$ap[$i]->Nver}}</span> </li>@endif
                                    @if($ap[$i]->interne)
                                    @if($ap[$i]->interne!=$ap[$i-1]->interne)<li><span class="causale"><span style="font-weight: bold">Developpe en </span></span>Externe</span> </li>@endif
                                    @else
                                        @if($ap[$i]->interne!=$ap[$i-1]->interne)<li><span class="causale"><span style="font-weight: bold">Developpe en </span></span>Interne</span> </li>@endif
                                    @endif
                                @if($ap[$i]->editeur!=$ap[$i-1]->editeur)<li><span class="causale"><span style="font-weight: bold">Editeur :</span></span>{{$ap[$i]->editeur}}</span> </li>@endif
                                @if($ap[$i]->DMP!=$ap[$i-1]->DMP)<li><span class="causale"><span style="font-weight: bold">Date mise en place : </span>{{$ap[$i]->DMP}}</span> </li>@endif
                                @if($ap[$i]->nomserveur!=$ap[$i-1]->nomserveur)<li><span class="causale"><span style="font-weight: bold">Nom du serveur : </span>{{$ap[$i]->nomserveur}}</span> </li>@endif
                                @if($ap[$i]->adressIP!=$ap[$i-1]->adressIP)<li><span class="causale"><span style="font-weight: bold">Adresse IP : </span>{{$ap[$i]->adressIP}}</span> </li>@endif
                                @if($ap[$i]->OS!=$ap[$i-1]->OS)<li><span class="causale"><span style="font-weight: bold">Système d'exploitation : </span>{{$ap[$i]->OS}}</span> </li>@endif
                                @if($ap[$i]->verOS!=$ap[$i-1]->verOS)<li><span class="causale"><span style="font-weight: bold">Version OS : </span>{{$ap[$i]->verOS}}</span> </li>@endif
                                @if($ap[$i]->DB!=$ap[$i-1]->DB)<li><span class="causale"><span style="font-weight: bold">Base de données : </span>{{$ap[$i]->DB}}</span> </li>@endif
                                @if($ap[$i]->verDB!=$ap[$i-1]->verDB)<li><span class="causale"><span style="font-weight: bold">Version BD : </span>{{$ap[$i]->verDB}}</span> </li>@endif
                                    @if($ap[$i]->Architecture!=$ap[$i-1]->Architecture)<li><span class="causale"><span style="font-weight: bold">Architecture : </span>{{$ap[$i]->Architecture}}</span> </li>@endif
                                @if($ap[$i]->typeapp!=$ap[$i-1]->typeapp)<li><span class="causale"><span style="font-weight: bold">Type Application : </span>{{$ap[$i]->typeapp}}</span> </li>@endif
                                @if($ap[$i]->description!=$ap[$i-1]->description)<li><span class="causale"><span style="font-weight: bold">Déscription : </span>{{$ap[$i]->description}}</span> </li>@endif
                                @if($ap[$i]->admetier!=$ap[$i-1]->admetier)<li><span class="causale"><span style="font-weight: bold">Administrateur Métier : </span>{{$ap[$i]->admetier}}</span> </li>@endif
                                @if($ap[$i]->adbd!=$ap[$i-1]->adbd)<li><span class="causale"><span style="font-weight: bold">Administrateur BD : </span>{{$ap[$i]->adbd}}</span> </li>@endif
                                @if($ap[$i]->adsys!=$ap[$i-1]->adsys)<li><span class="causale"><span style="font-weight: bold">Administrateur Système : </span>{{$ap[$i]->adsys}}</span> </li>@endif
                                <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{$ap[$i]->DDM}}</small></p> </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-11" style="display:{{$right}}">
                        <div class="timeline-panel debits">
                            <ul class="timeline-panel-ul">
                                @if($ap[$i]->nom!=$ap[$i-1]->nom)<li><span class="causale"><span style="font-weight: bold">Nom : </span>{{$ap[$i]->nom}}</span> </li>@endif
                                @if($ap[$i]->Nver!=$ap[$i-1]->Nver)<li><span class="causale"><span style="font-weight: bold">N° Version :</span>{{$ap[$i]->Nver}}</span> </li>@endif
                                    @if($ap[$i]->interne)
                                        @if($ap[$i]->interne!=$ap[$i-1]->interne)<li><span class="causale"><span style="font-weight: bold">Developpe en </span></span>Externe</span> </li>@endif
                                    @else
                                        @if($ap[$i]->interne!=$ap[$i-1]->interne)<li><span class="causale"><span style="font-weight: bold">Developpe en </span></span>Interne</span> </li>@endif
                                    @endif
                                @if($ap[$i]->editeur!=$ap[$i-1]->editeur)<li><span class="causale"><span style="font-weight: bold">Editeur : </span>{{$ap[$i]->editeur}}</span> </li>@endif
                                @if($ap[$i]->DMP!=$ap[$i-1]->DMP)<li><span class="causale"><span style="font-weight: bold">Date mise en place : </span>{{$ap[$i]->DMP}}</span> </li>@endif
                                @if($ap[$i]->nomserveur!=$ap[$i-1]->nomserveur)<li><span class="causale"><span style="font-weight: bold">Nom du serveur : </span>{{$ap[$i]->nomserveur}}</span> </li>@endif
                                @if($ap[$i]->adressIP!=$ap[$i-1]->adressIP)<li><span class="causale"><span style="font-weight: bold">Adresse IP : </span>{{$ap[$i]->adressIP}}</span> </li>@endif
                                @if($ap[$i]->OS!=$ap[$i-1]->OS)<li><span class="causale"><span style="font-weight: bold">Système d'exploitation : </span>{{$ap[$i]->OS}}</span> </li>@endif
                                @if($ap[$i]->verOS!=$ap[$i-1]->verOS)<li><span class="causale"><span style="font-weight: bold">Version OS : </span>{{$ap[$i]->verOS}}</span> </li>@endif
                                @if($ap[$i]->DB!=$ap[$i-1]->DB)<li><span class="causale"><span style="font-weight: bold">Base de données : </span>{{$ap[$i]->DB}}</span> </li>@endif
                                @if($ap[$i]->verDB!=$ap[$i-1]->verDB)<li><span class="causale"><span style="font-weight: bold">Version BD : </span>{{$ap[$i]->verDB}}</span> </li>@endif
                                    @if($ap[$i]->Architecture!=$ap[$i-1]->Architecture)<li><span class="causale"><span style="font-weight: bold">Architecture : </span>{{$ap[$i]->Architecture}}</span> </li>@endif
                                @if($ap[$i]->typeapp!=$ap[$i-1]->typeapp)<li><span class="causale"><span style="font-weight: bold">Type Application : </span>{{$ap[$i]->typeapp}}</span> </li>@endif
                                @if($ap[$i]->description!=$ap[$i-1]->description)<li><span class="causale"><span style="font-weight: bold">Déscription : </span>{{$ap[$i]->description}}</span> </li>@endif
                                @if($ap[$i]->admetier!=$ap[$i-1]->admetier)<li><span class="causale"><span style="font-weight: bold">Administrateur Métier : </span>{{$ap[$i]->admetier}}</span> </li>@endif
                                @if($ap[$i]->adbd!=$ap[$i-1]->adbd)<li><span class="causale"><span style="font-weight: bold">Administrateur BD : </span>{{$ap[$i]->adbd}}</span> </li>@endif
                                @if($ap[$i]->adsys!=$ap[$i-1]->adsys)<li><span class="causale"><span style="font-weight: bold">Administrateur Système : </span>{{$ap[$i]->adsys}}</span> </li>@endif
                                <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{$ap[$i]->DDM}}</small></p> </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
         <?php
            $env=$left;
            $left=$right;
            $right=$env
            ?>
        @endfor

            <div class="row timeline-movement">

                <div class="timeline-badge">
                    <div class="Text-Ver">
                        <span class="timeline-balloon-date-day"><strong>{{date('j F',strtotime($ap[1]->DDM))}}</strong></span>
                    </div>
                </div>


                <div class="col-sm-6  timeline-item">
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="timeline-panel credits">
                                <ul class="timeline-panel-ul">
                                    <li><span class="causale"><span style="font-weight: bold">Nom : </span>{{$ap[1]->nom}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">N° Version :</span>{{$ap[1]->Nver}}</span> </li>
                                    @if($ap[1]->interne)
                                        <li><span class="causale"><span style="font-weight: bold">Developpement :</span>Interne</span> </li>
                                    @else
                                        <li><span class="causale"><span style="font-weight: bold">Developpement :</span>Externe</span> </li>
                                    @endif
                                    <li><span class="causale"><span style="font-weight: bold">Editeur : </span>{{$ap[1]->editeur}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Date mise en place : </span>{{$ap[1]->DMP}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Nom du serveur : </span>{{$ap[1]->nomserveur}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">NAdresse IP : </span>{{$ap[1]->adressIP}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Système d'exploitation : </span></span>{{$ap[1]->OS}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Version OS : </span>{{$ap[1]->verOS}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Base de données : </span>{{$ap[1]->DB}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Version BD : </span>{{$ap[1]->verDB}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Architecture : </span>{{$ap[1]->Architecture}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Type Application : </span>{{$ap[1]->typeapp}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Déscription : </span>{{$ap[1]->description}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Administrateur Métier : </span>{{$ap[1]->admetier}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Administrateur BD : </span>{{$ap[1]->adbd}}</span> </li>
                                    <li><span class="causale"><span style="font-weight: bold">Administrateur Système : </span>{{$ap[1]->adsys}}</span> </li>

                                    <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{$ap[1]->DDM}}</small></p> </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>

    <a href="{{url('/FichApp/'.$app->first()->id)}}"><button  class="btn btn-outline-danger btn-lg retour " style="position: relative;left:90%; top:-57px;">Retour</button></a>
    <a href="{{url('/FichApp/ExportExcel/'.$app->first()->id)}}"><button  class="btn btn-success btn-lg retour " style="position: relative;left:60%; top:-57px;"><i class="fa fa-file-excel icon"></i> Exporter Vers Excel</button></a>
</div>
</body>
</html>
