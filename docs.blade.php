@extends('admin.adminmaster')
@section('main')
        <div class="content-wrapper">           
            <div class="container-fluid">
                        <div class="bg-light rounded h-100 p-4">
        
                        
                    <form class="d-none d-md-flex ms-4" action="{{ route('image.store') }}"  method="post" >
                    @csrf
                    @method('DELETE')
                        <input class="form-control border-0" type="search" placeholder="Search By Category Name" name="scname">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    
                      <button type="submit" class="btn btn-warning">Search</button>
                </form>
                
                <br>
                            <h6 class="mb-4">User's Query Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">order ID</th>
                                            <th scope="col">user Name</th>
                                            
                                            <th scope="col">Image</th>
                                            
                                            <th scope="col">Email</th>
                                            <th scope="col">Oprations</th>
                                             <th scope="col">Print Pdf</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        @if(sizeof($data)<=0)
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>Data Not Found!!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                                        @else
                                             @foreach($data as $d)
                                        <tr>
                                            <th scope="row">{{$d->id}}</th>
                                            <td>{{$d->title}}</td>
                                            <td><img src="\storage\{{$d->img}}" height="40px" width="50px"></td>
                                            <td>{{$d->meg}}</td>
                                            
                                            <td>
                                            <div class="btn-group" role="group">
                                            <form action="{{ route('image.destroy', $d->id) }}" method="post"> 
                                             @csrf
                                             @method('DELETE')  
                                                  <button type="submit" class="btn btn-danger" value="Delete"> Delete</button>
                                            </form>
                                                  <button type="button" class="btn btn-warning"><a href="{{ route('image.edit', $d->id) }}" style="color: white;">Edit</a></button>
                                            </div>
                                            </td>  

                                            <td>
                                                <a href="{{url('print_pdf',$d->id)}}" class="btn btn-secondary">print pdf</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                       </tbody> 
                                </table>

                                <div class="pagination">
                                {{ $data->links() }}
                                </div>

                                </div>
                        </div>
                    </div>
</div>

@endsection