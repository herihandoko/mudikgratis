<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="accordion tm-accordion accordion-classic accordion-theme-colored1" id="accordion500">
                    @foreach (@App\Models\Faq::all() as $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{$item->id}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{$item->id}}" aria-expanded="true"
                                    aria-controls="collapse-{{$item->id}}">
                                    <strong>{{$item->question}}</strong>
                                </button>
                            </h2>
                            <div id="collapse-{{$item->id}}"
                                class="accordion-collapse collapse @if ($loop->iteration == 1)
                                show
                            @endif"
                                aria-labelledby="heading-{{$item->id}}" data-bs-parent="#accordion500">
                                <div class="accordion-body">
                                    {{$item->answer}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
