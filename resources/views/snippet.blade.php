<div class="container" id="snippet">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>Update Snippet</h4>
                    <div class="form-group">
                        <textarea class="form-control" v-model="header" placeholder="Enter your header snippets"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" v-model="body" placeholder="Enter your body snippets"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" v-model="footer" placeholder="Enter your footer snippets"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="button" v-on:click="addSnippet" v-bind:disabled="isDisabled" class="btn btn-success" value="Save" />
                    </div>
                    <hr />
                    <h4>Snippet</h4>
                    <h1>Header Snippets</h1>
                    <pre>@{{ snippet.header }}</pre>
                    <h1>Body Snippets</h1>
                    <pre>@{{ snippet.body }}</pre>
                    <h1>Footer Snippets</h1>
                    <pre>@{{ snippet.footer }}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>

<!-- Add Vue Code -->
<script defer>
    var hfcm = new Vue({
        el: '#snippet',
        data: {
            header: null,
            body: null,
            footer: null,
            isDisabled: false,
            snippet: [],
        },
        methods: {
            fetchSnippets() {
                var vm = this;
                var url = '{{ route('hfcm.index') }}';

                fetch(url)
                    .then(function(response) {
                        return response.json()
                    })
                    .then(function(json) {
                        vm.snippet = json.snippet
                    })
            },
            addSnippet(event) {
                event.preventDefault();
                this.isDisabled = true;
                const token = document.head.querySelector('meta[name="csrf-token"]');
                const data = {
                    header: this.header,
                    body: this.body,
                    footer: this.footer,
                };
                fetch('{{ route('hfcm.store') }}', {
                    body: JSON.stringify(data),
                    credentials: 'same-origin',
                    headers: {
                        'content-type': 'application/json',
                        'x-csrf-token': token.content,
                    },
                    method: 'POST',
                    mode: 'cors',
                }).then(response => {
                    this.isDisabled = false;
                    if (response.ok) {
                        this.header = '';
                        this.body = '';
                        this.footer = '';
                        this.fetchSnippets();
                    }
                })
            },
        },
        created() {
            this.fetchSnippets();
        }
    });
</script>
