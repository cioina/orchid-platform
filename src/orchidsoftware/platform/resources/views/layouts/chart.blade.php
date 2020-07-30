<div
     data-controller="screen--chart"
     data-screen--chart-parent="#{{$slug}}"
     data-screen--chart-title="{{$title}}"
     data-screen--chart-labels="{{$labels}}"
     data-screen--chart-datasets="{{$data}}"
     data-screen--chart-type="{{$type}}"
     data-screen--chart-height="{{$height}}"
     data-screen--chart-colors="{{$colors}}"
     data-screen--chart-max-slices="{{$maxSlices}}"
     data-screen--chart-values-over-points="{{$valuesOverPoints}}"
     data-screen--chart-axis-options="{{$axisOptions}}"
     data-screen--chart-bar-options="{{$barOptions}}"
     data-screen--chart-line-options="{{$lineOptions}}"
>
    <div class="row pt-3">
        <div class="pos-rlt w-100">
            <div class="top-right pt-1 pr-4" style="z-index: 1">
                <button class="btn btn-sm btn-link"
                        data-action="screen--chart#export">
                    {{ __('Export') }}
                </button>
            </div>

            <figure id="{{$slug}}" class="w-100 h-full"></figure>
        </div>
    </div>
</div>
