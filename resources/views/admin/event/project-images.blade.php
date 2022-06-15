    <div class="owl-carousel">
        @php $images = json_decode($project->images); @endphp
        @foreach($images as $image)
            <div class="item">
                <img src="{{asset('images/projects/'.$image)}}" alt="banner image"/>
                <a href="{{mob_route('remove.image',['project'=>$project->id,'image'=>$image])}}" class="btn btn-primary">{{__('buttons.delete')}}</a>
            </div>
        @endforeach
    </div>
