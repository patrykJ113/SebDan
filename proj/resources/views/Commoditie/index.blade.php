@extends('Layouts.app')

@section('content')
        

              <ul class="nav nav-pills mb-4 " id="pills-tab" role="tablist">
                    <li class="nav-item " role="presentation">
                        <button class="nav-link active" 
                            id="pills-home-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-ON" 
                            type="button" role="tab" aria-controls="pills-home" 
                            aria-selected="true">Włączone
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " 
                            id="pills-home-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-OFF" 
                            type="button" role="tab" aria-controls="pills-home" 
                            aria-selected="true">Wyłączone
                        </button>
                    </li>
              </ul>
              
              <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" 
                        id="pills-ON" 
                        role="tabpanel" aria-labelledby="pills-home-tab">


                        <table class="table table-hover">
                            <tr>
                               <th class="text-center">#</th>
                               <th class="text-center">Nazwa</th>
                               <th class="text-center">Opis</th>
                               <th class="text-center">Cena</th>
                               <th class="text-center">Edycja</th>
                               <th class="text-center">Usuń</th>
                               <th class="text-center">Włącz wyłącz</th>
                           </tr>
                           
                            @foreach ($commodities as $commoditie)
                                <tr>
                                   <td class="text-center"><a href="/commodities/{{$commoditie->id}}">{{ $commoditie->id }}</a></td>
                                   <td class="text-center"><a href="/commodities/{{$commoditie->id}}">{{ $commoditie->name }}</a></td>
                                   <td class="text-center"><a href="/commodities/{{$commoditie->id}}">{{ $commoditie->description }}</a></td>
                                   <td class="text-center"><a href="/commodities/{{$commoditie->id}}">{{ $commoditie->price }}</a></td>

                                   <td class="text-center">
                                       <button style="background-color: Transparent">
                                        <a href="/commodities/{{$commoditie->id}}/edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                         </a>
                                       </button>
                                   </td>

                                   <td class="text-center">
                                    <form action="/commodities/{{$commoditie->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" style="background-color: Transparent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                              </svg>
                                        </button>
                                    </form>
                                 </td>

                                 <td class="text-center">
                                    <form action="/commodities/{{$commoditie->id}}?mode=OFF" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" style="background-color: Transparent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb-off" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2.23 4.35A6.004 6.004 0 0 0 2 6c0 1.691.7 3.22 1.826 4.31.203.196.359.4.453.619l.762 1.769A.5.5 0 0 0 5.5 13a.5.5 0 0 0 0 1 .5.5 0 0 0 0 1l.224.447a1 1 0 0 0 .894.553h2.764a1 1 0 0 0 .894-.553L10.5 15a.5.5 0 0 0 0-1 .5.5 0 0 0 0-1 .5.5 0 0 0 .288-.091L9.878 12H5.83l-.632-1.467a2.954 2.954 0 0 0-.676-.941 4.984 4.984 0 0 1-1.455-4.405l-.837-.836zm1.588-2.653.708.707a5 5 0 0 1 7.07 7.07l.707.707a6 6 0 0 0-8.484-8.484zm-2.172-.051a.5.5 0 0 1 .708 0l12 12a.5.5 0 0 1-.708.708l-12-12a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </form>
                                 </td>
                                </tr>
                            @endforeach
                           
                        </table>
                    </div>

                    @include('Menu.table',['commodities'=>$commoditiesOFF , 'active'=>false, 'id'=>'pills-OFF'])
                    
                    <a href="commodities/create"  class="btn btn-primary">Add commoditie</a>

              </div>
@endsection