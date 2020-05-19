@extends('layouts.admin')
@section('principal')
    <title>Evaluacion Docente 2019</title>
  <div class="container"> 
   <div class="row">
    <div class="col-md-11">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="marta">
        <div class="panel panel-default">
                   <div class="panel-heading ">
                       <center><h4>Grupos Evaluados</h4></center> 
                    </div>
               </div>
<table>
  
  
</table>

<table class="table" >
      <thead>
       <tr>
                                        
  <th>Grupos</th>
  <th>#De alumno del Grupo</th>
  <th>alumno evaluado</th>
  <th>alumno fantante</th>                         
                                        
          </tr>
       </thead>
        <tbody style="border-bottom: 1px solid #000;">
            
              <tr>
              <td>Tic</td>
              <td>36</td>
              <td>26</td>
              <td>10</td>
              <td>

            <a href="{{ url('/Grupos') }}" title="View Planed"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>vista </button></a>
                   
                  </td>
                  <tr>
              <td>Tic</td>
              <td>36</td>
              <td>26</td>
              <td>10</td>
              <td>

            <a href="{{ url('/Grupos') }}" title="View Planed"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>vista </button></a>
                   
                  </td>
                </tr> 
                </tr>                        
             </tbody>
        </table>

      </section>
    </div>
  </div>
</div>





  @endsection
