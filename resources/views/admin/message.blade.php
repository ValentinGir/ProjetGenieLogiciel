@extends('admin.base')
@section('content')
    <div class="content container m-0">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h4>Messages</h4>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Noms</th>
                        <th scope="col">Emails</th>
                        <th scope="col">Telephones</th>
                        <th scope="col">Messages</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr class={{ $message->statut==0? 'fw-bold':''}}>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->telephone }}</td>
                            <td>{{ $message->message }}</td>
                            <td>
                                <a href="#" class="btnMessage" data-bs-toggle="modal" data-bs-target="#afficheMessage"><i
                                        class="fs-5 bi bi-pencil-square text-primary"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="afficheMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Répondre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form id="contactForm" method="post" class="mb-5" action="">
                        @csrf

                        <div class="form-floating mb-3">
                            <input class="form-control @error('message') is-invalid @enderror" id="message" type="text"
                                   data-sb-validations="required" name="matiere" required/>
                            <label for="email">Message</label>

                            @error('message')
                            <div class="invalid-feedback" data-sb-feedback="email:email">{{ $message }}</div>
                            @enderror
                            <input type="hidden" id="idMessage" name="id_message">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-sm" id="submitButton" type="submit">
                                Envoyer
                            </button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function () {


        });
    </script>
@endsection
