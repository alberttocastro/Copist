@extends('application.layout')

@section('main')
    <div class="container">
        
        {{-- Caso a pessoa tenha um instrutor, mostra --}}
        @if ($address->is_visited())
        <div class="row">
            <div class="col s10 offset-s2">
                <div class="card blue darken-2 z-depth-2 center">
                    <span class="white-text">
                        <p style="font-size: 20px; padding-top: 3%;padding-bottom: 3%;"><span style="font-weight: bolder">Instructor</span> {{$address->publisher->name}}</p>          
                    </span>
                </div>
            </div>
        </div>
        @endif
        
        <div class="col">
            
            {{-- <%#Nome%> --}}
            <div class="row mb-0">
                <div class="col s2 right-align">
                    <i class="material-icons small indigo-text text-darken-4">account_box</i>
                </div>
                <div class="col s10">
                    <div class="small-title-font indigo-text text-darken-4">Name</div>
                </div>
            </div>
            <div class="row">
                <div class="col s10 offset-s2">
                    <div class="left-align description-font">
                         {{$address->name}} 
                        <div class="divider"></div>
                    </div> 
                </div>
            </div>
            
            {{-- <%#Nacionalidade%> --}}
            <div class="row mb-0">
                <div class="col s2 right-align">
                    <i class="material-icons small indigo-text text-darken-4">map</i>
                </div>
                <div class="col s10">
                    <div class="small-title-font indigo-text text-darken-4">Nationality</div>
                </div>
            </div>
            <div class="row">
                <div class="col s10  offset-s2">
                    <div class="left-align description-font">
                        {{ $address->nationality->name }}
                        <div class="divider"></div>
                    </div> 
                </div>
            </div>
            
            {{-- <%#Referência%> --}}
            <div class="row mb-0">
                <div class="col s2 right-align">
                    <i class="material-icons small indigo-text text-darken-4">location_searching</i>
                </div>
                <div class="col s10">
                    <div class="small-title-font indigo-text text-darken-4">Reference</div>
                </div>
            </div>
            <div class="row">
                <div>
                    <div class="col s10 offset-s2">
                        <div class="left-align description-font">
                            <p class="flow-text mt-0 mb-0">  {{ $address->references}}  </p>
                            <div class="divider"></div>
                        </div> 
                    </div>
                </div>
            </div>
            
            {{-- <%#Comentários%> --}}
            <div class="row mb-0">
                <div class="col s2">
                    <div class="right-align">
                        <i class="material-icons small indigo-text text-darken-4">chat_bubble</i>
                    </div>
                </div>
                <div class="col s10">
                    <div class="small-title-font indigo-text text-darken-4">Comments</div>
                </div>
            </div>
            <div class="row">
                <div class="col s10 offset-s2">
                    <div class="left-align description-font">
                        <p class="flow-text mt-0 mb-0">  {{ $address->comments }} </p>
                    </div> 
                </div>
            </div>
            
        </div>
        
        @if($address->visits == [])
        <div class="carousel carousel-slider">

            <div class="row hide-on-small-only">
                <div class="col offset-s1">
                    <h3 style="font-weight: 500" class="indigo-text text-darken-4">
                        Visits
                    </h3>
                </div>
            </div>
            
            @foreach($address->visits as $visit)
            <a class="carousel-item valign-wrapper">
                
                <div class="row mb-0">
                    <div class="col s12 m10 offset-m1">
                        <div class="card white">
                            <div class="card-content black-text">
                                <div class="card-title left-align mb-0" style="font-weight: 400">
                                    <div class="row mb-0">
                                        <div class="col">
                                            <div class="valign-wrapper">
                                                <i class="material-icons medium valign-wrapper" style="padding-top: 18%">account_circle</i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row mb-0">
                                                {{$visit->publisher->name}}
                                            </div>
                                            <div class="row">
                                                <h6 class="mt-0" style="font-weight: 300">{{--<%= visit.date.nil? ? "No date" : visit.date.strftime("%d/%m/%Y") %>--}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-weight: 300">
                                    {{$visit->comment}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </a>
            @endforeach {{-- Fim das iterações sob as visitas dos endereços --}}
            
        </div>
        @endif
        
        
    </div>
@endsection