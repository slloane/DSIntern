    

    @extends('layout')
 
 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('hr.mesmesoffres.create') }}"> Ajouter une offre de stage</a>
             </div>
             
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <table class="table table-bordered">
         <tr>
             <th>No</th>
             <th>type du stage</th>
             <th>duree du stage</th>
             <th>Profil requis</th>
 
             <th width="280px">Action</th>
         </tr>
         @foreach ($mesoffres as $offre_stage)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $offre_stage->type_stage }}</td>
             <td>{{ $offre_stage->duree_stage }}</td>
             <td>{{ $offre_stage->profil_requis }}</td>
 
             <td>
                 <form action="{{ route('hr.mesmesoffres.destroy',$offre_stage->id) }}" method="POST">
    
                     <a class="btn btn-info" href="{{ route('hr.mesmesoffres.show',$offre_stage->id) }}">Show</a>
     
                     <a class="btn btn-primary" href="{{ route('hr.mesmesoffres.edit',$offre_stage->id) }}">Edit</a>
    
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">Delete</button>
                     </div>
                 </form>
             </td>
 
             
         </tr>
         @endforeach
     </table>
   
     {!! $mesoffres->links() !!}
 
     
 
       
 @endsection
 