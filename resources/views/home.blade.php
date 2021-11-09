@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    Home
</h6>
<div class="mT-30"></div>
@endsection
@section('scripts')
@parent

@endsection
{{-- <div class="row gap-20 masonry pos-r" style="position: relative; height: 1816px;">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item w-100" style="position: absolute; left: 0%; top: 0px;">
       <div class="row gap-20">
          <div class="col-md-3">
             <div class="layers bd bgc-white p-20">
                <div class="layer w-100 mB-10">
                   <h6 class="lh-1">Total Visits</h6>
                </div>
                <div class="layer w-100">
                   <div class="peers ai-sb fxw-nw">
                      <div class="peer peer-greed">
                         <span id="sparklinedash">
                            <canvas width="45" height="20" style="display: inline-block; width: 45px; height: 20px; vertical-align: top;"></canvas>
                         </span>
                      </div>
                      <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10%</span></div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-3">
             <div class="layers bd bgc-white p-20">
                <div class="layer w-100 mB-10">
                   <h6 class="lh-1">Total Page Views</h6>
                </div>
                <div class="layer w-100">
                   <div class="peers ai-sb fxw-nw">
                      <div class="peer peer-greed">
                         <span id="sparklinedash2">
                            <canvas width="45" height="20" style="display: inline-block; width: 45px; height: 20px; vertical-align: top;"></canvas>
                         </span>
                      </div>
                      <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">-7%</span></div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-3">
             <div class="layers bd bgc-white p-20">
                <div class="layer w-100 mB-10">
                   <h6 class="lh-1">Unique Visitor</h6>
                </div>
                <div class="layer w-100">
                   <div class="peers ai-sb fxw-nw">
                      <div class="peer peer-greed">
                         <span id="sparklinedash3">
                            <canvas width="45" height="20" style="display: inline-block; width: 45px; height: 20px; vertical-align: top;"></canvas>
                         </span>
                      </div>
                      <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span></div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-3">
             <div class="layers bd bgc-white p-20">
                <div class="layer w-100 mB-10">
                   <h6 class="lh-1">Bounce Rate</h6>
                </div>
                <div class="layer w-100">
                   <div class="peers ai-sb fxw-nw">
                      <div class="peer peer-greed">
                         <span id="sparklinedash4">
                            <canvas width="45" height="20" style="display: inline-block; width: 45px; height: 20px; vertical-align: top;"></canvas>
                         </span>
                      </div>
                      <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span></div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="masonry-item col-md-12" style="position: absolute; left: 0%; top: 708px;">
       <div class="bd bgc-white">
          <div class="layers">
             <div class="layer w-100 pX-20 pT-20">
                <h6 class="lh-1">Monthly Stats</h6>
             </div>
             <div class="layer w-100 p-20">
                <div class="chartjs-size-monitor">
                   <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                   </div>
                   <div class="chartjs-size-monitor-shrink">
                      <div class=""></div>
                   </div>
                </div>
                <canvas id="line-chart" height="151" style="display: block; width: 568px; height: 151px;" width="568" class="chartjs-render-monitor"></canvas>
             </div>
             <div class="layer bdT p-20 w-100">
                <div class="peers ai-c jc-c gapX-20">
                   <div class="peer"><span class="fsz-def fw-600 mR-10 c-grey-800">10% <i class="fa fa-level-up c-green-500"></i></span> <small class="c-grey-500 fw-600">APPL</small></div>
                   <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">2% <i class="fa fa-level-down c-red-500"></i></span> <small class="c-grey-500 fw-600">Average</small></div>
                   <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">15% <i class="fa fa-level-up c-green-500"></i></span> <small class="c-grey-500 fw-600">Sales</small></div>
                   <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">8% <i class="fa fa-level-down c-red-500"></i></span> <small class="c-grey-500 fw-600">Profit</small></div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="masonry-item col-md-6" style="position: absolute; left: 50%; top: 529px;">
      <div class="bgc-white p-20 bd">
         <h6 class="c-grey-900">Bar Chart</h6>
         <div class="mT-30">
            <div class="chartjs-size-monitor">
               <div class="chartjs-size-monitor-expand">
                  <div class=""></div>
               </div>
               <div class="chartjs-size-monitor-shrink">
                  <div class=""></div>
               </div>
            </div>
            <canvas id="bar-chart" height="416" width="568" style="display: block; width: 568px; height: 416px;" class="chartjs-render-monitor"></canvas>
         </div>
      </div>
   </div>
    <div class="masonry-item col-md-6" style="position: absolute; left: 50%; top: 1024px;">
       <div class="bd bgc-white">
          <div class="layers">
             <div class="layer w-100 p-20">
                <h6 class="lh-1">Sales Report</h6>
             </div>
             <div class="layer w-100">
                <div class="bgc-light-blue-500 c-white p-20">
                   <div class="peers ai-c jc-sb gap-40">
                      <div class="peer peer-greed">
                         <h5>November 2017</h5>
                         <p class="mB-0">Sales Report</p>
                      </div>
                      <div class="peer">
                         <h3 class="text-end">$6,000</h3>
                      </div>
                   </div>
                </div>
                <div class="table-responsive p-20">
                   <table class="table">
                      <thead>
                         <tr>
                            <th class="bdwT-0">Name</th>
                            <th class="bdwT-0">Status</th>
                            <th class="bdwT-0">Date</th>
                            <th class="bdwT-0">Price</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <td class="fw-600">Item #1 Name</td>
                            <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c rounded-pill">Unavailable</span></td>
                            <td>Nov 18</td>
                            <td><span class="text-success">$12</span></td>
                         </tr>
                         <tr>
                            <td class="fw-600">Item #2 Name</td>
                            <td><span class="badge bgc-deep-purple-50 c-deep-purple-700 p-10 lh-0 tt-c rounded-pill">New</span></td>
                            <td>Nov 19</td>
                            <td><span class="text-info">$34</span></td>
                         </tr>
                         <tr>
                            <td class="fw-600">Item #3 Name</td>
                            <td><span class="badge bgc-pink-50 c-pink-700 p-10 lh-0 tt-c rounded-pill">New</span></td>
                            <td>Nov 20</td>
                            <td><span class="text-danger">-$45</span></td>
                         </tr>
                         <tr>
                            <td class="fw-600">Item #4 Name</td>
                            <td><span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c rounded-pill">Unavailable</span></td>
                            <td>Nov 21</td>
                            <td><span class="text-success">$65</span></td>
                         </tr>
                         <tr>
                            <td class="fw-600">Item #5 Name</td>
                            <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c rounded-pill">Used</span></td>
                            <td>Nov 22</td>
                            <td><span class="text-success">$78</span></td>
                         </tr>
                         <tr>
                            <td class="fw-600">Item #6 Name</td>
                            <td><span class="badge bgc-orange-50 c-orange-700 p-10 lh-0 tt-c rounded-pill">Used</span></td>
                            <td>Nov 23</td>
                            <td><span class="text-danger">-$88</span></td>
                         </tr>
                         <tr>
                            <td class="fw-600">Item #7 Name</td>
                            <td><span class="badge bgc-yellow-50 c-yellow-700 p-10 lh-0 tt-c rounded-pill">Old</span></td>
                            <td>Nov 22</td>
                            <td><span class="text-success">$56</span></td>
                         </tr>
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
          <div class="ta-c bdT w-100 p-20"><a href="#">Check all the sales</a></div>
       </div>
    </div>
</div> --}}