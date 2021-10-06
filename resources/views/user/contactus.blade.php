<x-pagelayout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.94722669327!2d2.2770200216386893!3d48.8588377392324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C%20France!5e0!3m2!1sen!2ssg!4v1629695314231!5m2!1sen!2ssg" 
                    height="450px" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"
                    class="w-100 px-3"
                >
                </iframe>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                <div class="card m-3">
                    <div class="card-header customHeader mt-3">
                        <h2 class="text-center">Contact Us</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('contact_message')}}" method="POST"> 
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Name" name="username"/>
                                @error('username')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email"/>
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <textarea name="messages" id="" cols="30" rows="10" class="form-control" placeholder="Message"></textarea>
                                @error('messages')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn customButton btn-block mb-3">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-pagelayout>
