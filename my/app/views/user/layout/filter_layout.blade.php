<div class="col-md-3 col-sm-3 col-xs-12 filter-fix-price" style="margin-top: 20px;">
    <div class="btn-group btn-group-justified filter-price" role="group" aria-label="...">
        <a class="btn btn-default" href="<?php echo URL::to('/'); ?>/trending">All</a>
        <a class="btn btn-default" href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } ?>/range/0~49<?php if (isset($color)) { ?>/color/{{$color}}<?php } ?>">$</a>
        <a class="btn btn-default" href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } ?>/range/50~99<?php if (isset($color)) { ?>/color/{{$color}}<?php } ?>">$$</a>
        <a class="btn btn-default" href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } ?>/range/100~2000<?php if (isset($color)) { ?>/color/{{$color}}<?php } ?>">$$$</a>
    </div>
</div>
<!--<div class="col-md-3 col-sm-4 col-xs-12 filter-color">
    <ul class="filter-circle">
        <li id="red"><a href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } if (isset($range)) { ?>/range/{{$range}}<?php } ?>/color/red" title="red"></a></li>
        <li><a href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } if (isset($range)) { ?>/range/{{$range}}<?php } ?>/color/purple" title="purple"></a></li>
        <li><a href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } if (isset($range)) { ?>/range/{{$range}}<?php } ?>/color/yellow" title="yellow"></a></li>
        <li><a href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } if (isset($range)) { ?>/range/{{$range}}<?php } ?>/color/blue" title="blue"></a></li>
        <li><a href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } if (isset($range)) { ?>/range/{{$range}}<?php } ?>/color/green" title="green"></a></li>
        <li><a href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } if (isset($range)) { ?>/range/{{$range}}<?php } ?>/color/black" title="red"></a></li>
        <li><a href="<?php echo URL::to('/'); ?><?php if (isset($id)) { ?>/category/{{$id}}<?php } if (isset($range)) { ?>/range/{{$range}}<?php } ?>/color/gray" title="gray"></a></li>
    </ul>
</div>-->

<input type="hidden" id="category" value="<?php if (isset($id)) { ?>{{$id}}<?php } ?>">
<input type="hidden" id="range" value="<?php if (isset($range)) { ?>{{$range}}<?php } ?>">
<input type="hidden" id="color" value="<?php if (isset($color)) { ?>{{$color}}<?php } ?>">
