<x-adminlayout>
  <div class="container">
        <div class="table-responsive mt-5">
            <table class="table table-hover">
                <thead class="bg-info">
                  <tr class="text-center">
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">isAdmin?</th>
                    <th scope="col">isPremium?</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->email}}</td>
                      <td class="font-weight-bold">{{$user->Admin === 0   ? 'False' : 'True'}}</td>
                      <td class="font-weight-bold">{{$user->Premium === 0 ? 'False' : 'True'}}</td>
                      <td>
                          <a href="{{route('edit_user',$user->id)}}" class="btn btn-sm btn-success text-white">
                              <i class="fas fa-edit"></i>
                          </a>
                      </td>
                      <td>
                          <a href="{{route('delete_user',$user->id)}}" class="btn btn-sm btn-danger text-white">
                              <i class="fas fa-trash-alt"></i>
                          </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
  </div>
</x-adminlayout>
