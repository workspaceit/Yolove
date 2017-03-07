<div class="col-md-12 center-div size-show clear_fix">
    <h4 class="text-uppercase">Size Guide</h4>
    <p class="help-block">Womens size guide</p>
    <div class="col-md-8 no-padding">
        <div class="row no-margin">
            <table class="table table-bordered table-hover cstm-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>XS</th>
                        <th>S</th>
                        <th>M</th>
                        <th>L</th>
                        <th>XL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Bust</th>
                        <td>33.5</td>
                        <td>34.5</td>
                        <td>35.5</td>
                        <td>37.5</td>
                        <td>38.5</td>
                    </tr>
                    <tr>
                        <th scope="row">Natural Waist</th>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28.5</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <th scope="row">Hip</th>
                        <td>35</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38.5</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <th scope="row">Dress Size</th>
                        <td>0-2</td>
                        <td>2-4</td>
                        <td>4-6</td>
                        <td>6-8</td>
                        <td>8-10</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p>Model Shown here wear XL size</p>
            <p>Model's body measurment: height 5'10", bust 32, hips 35, natural waist 24 </p>
            <br>
        </div>
        <div class="row no-margin">
            <h4 class="text-uppercase">How to measure</h4>
            <div class="row clearfix no-margin">
                <label>Burst</label>
                <p>Measure under your arms at the fuller part of your bust. Keep tape level across your shoulder blades.</p>
            </div>
            <div class="row clearfix no-margin">
                <label>Natural Waist</label>
                <p>Measure around your natural waistline,keeping the tape comportably loose.</p>
            </div>
            <div class="row clearfix no-margin">
                <label>Hips</label>
                <p>Stand with your feet together and measure arround the fullest part of your hips.</p>
            </div>
            <div class="row clearfix no-margin">
                <label>Inseam</label>
                <p>Using a pair of your pants that fit well, measure from crotch seam to bottom of leg.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @if(isset($image))
        <img class="img-responsive" src="<?php echo $api_url.$image; ?>"/>
        @else
        <img class="img-responsive" src=""/>
        @endif
<!--        place your image here-->
    </div>

</div>