<x-adminlayout>
  <div class="container">
      <div class="table-responsive mt-5">
          <table class="table table-hover">
              <thead class="adminThead">
                <tr class="text-center">
                  <th scope="col">id</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Messages</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($messages as $message)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$message->username}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->messages}}</td>
                    <td>
                        <a href="{{route('delete_message',$message->id)}}" class="btn btn-sm btn-danger text-white">
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
