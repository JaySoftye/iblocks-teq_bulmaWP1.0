<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.3
 */

?>
<section class="hero is-fullheight" style="margin-top: calc(-5% + 1px);">
  <div class="hero-body">
    <div class="container has-text-centered">
      <div class="column is-8 is-offset-2">
        <h1><a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/iblocks-teq-logo_transparent.png" alt="iBlocks" /></a></h1>
        <h1 class="title white">End-User License Agreement (EULA)</h1>
        <div class="card content">
          <article id="ula-agreement" class="card-content">
            <p>1. INTRODUCTION. Teq, Inc. (“Teq”) grants to the school or other organization (the “Organization”) which purchases this content (the “License”) a limited license to use Teq’s proprietary Content (as defined below) strictly as set forth in this agreement (the “Agreement”). By checking the “I Agree” box on the website or using the Content, you agree to legally bind you and your Organization to the terms of this Agreement. </p>
            <p>2. RIGHTS INCLUDED. The License includes curriculum materials, teacher’s guides, student materials, original leadership and education principles, handouts, images, messages, text, data, and other copyrighted content in any format or medium (collectively, “Content”). The License is limited to the Content included in the materials made available by Teq as part of the package licensed by the Organization; separate subscriptions are required to access other Content offered by Teq (e.g. Online PD, nOw Instructional Support, Teq Essentials, etc.)</p>
            <p>3. LIMITED LICENSE. Subject to the terms of this Agreement, Teq grants to the Organization a limited, nonexclusive, royalty-free, perpetual license to display, reproduce and utilize the Content. Except as expressly provided otherwise, the Organization agrees not to use any Content, or derivative thereof, in, on, or associated with any for-sale products or services, including products or services sold to members of the Organization or make the product available to members outside of the Organization.</p>

            <p>4. NO SUBLICENSE OR ASSIGNMENT. The License granted by this Agreement does not permit the Organization to sublicense the Content, or assign this Agreement, to any other person or organization without the prior written approval of Teq. Any attempted sublicense or assignment without such approval is null and void and constitutes a material breach of this Agreement.  </p>



            <p>5. VALID RIGHTS/NOTICE OF INFRINGMENT. The Organization acknowledges that the copyrightable components of the Content are copyrighted works exclusively owned by Teq and/or its licensors. The Organization will not challenge or dispute Teq’s exclusive rights in and to the Content and agrees to provide prompt written notice to Teq in the event that the Organization learns that any person or organization infringed or is infringing upon Teq’s rights to the Content. </p>



            <p>6. WARRANTIES. EXCEPT AS OTHERWISE PROVIDED IN THIS SECTION, THE CONTENT AND LICENSE ARE PROVIDED “AS IS”. Teq represents that, to the best of its knowledge, it has the right to license the Content to the Organization for the uses set forth in this Agreement. TEQ MAKES NO OTHER WARRANTY, EXPRESS OR IMPLIED, REGARDING THE LICENSE OR CONTENT, AND EXPRESSLY MAKES NO WARRANTY OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. </p>



            <p>7. INDEMNIFICATION/INSURANCE. The Organization agrees to defend, indemnify, and hold harmless Teq and its subsidiaries, affiliates, officers, directors, employees, members, agents, and all of their successors and assigns against any claim, dispute, loss, expenses, damages, or other liability arising in whole or in part from the Organization’s breach of this Agreement or use of the Content, except solely for those claims that arise directly and solely from Teq’s gross negligence or breach of this Agreement. During the Term, the Organization represents that it carries general liability insurance (including coverage for the indemnification obligation in this Agreement), that it will add Teq as an additional insured under said policy, and that it will provide Teq with a certificate of insurance indicating same promptly upon Teq’s request. </p>



            <p>8. LIMITATION OF LIABILITY. Teq’s maximum liability to the Organization related in any way to this Agreement, the License, or Content will be the refund of the amount paid by the Organization for the License. IN NO EVENT WILL TEQ HAVE ANY LIABILITY TO THE ORGANIZATION FOR ANY OTHER AMOUNTS OR FOR ANY INDIRECT, SPECIAL, OR CONSEQUENTIAL DAMAGES UNDER ANY CAUSE OF ACTION OR THEORY OF LIABILITY, WHETHER OR NOT THE ORGANIZATION HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. </p>



            <p>9. RELATIONSHIP. This Agreement does not create any affiliate, partnership, joint venture, or agency relationship between Teq and the Organization, and the Organization agrees not to imply that any such relationship exists. </p>



            <p>10. TERMINATION. Teq reserves the right to terminate this Agreement at any time with no refund in the event of the Organization’s breach of any term of this Agreement. Additionally, Teq reserves the right at any time to terminate the license to a specific component of Content with a pro-rata refund to the Organization in the event Teq discovers that a component of Content infringes upon the rights of any third party. </p>



            <p>11. WAIVER. Failure by Teq to enforce any term of this Agreement will not be deemed a waiver of its right to enforce that or any other term of this Agreement or any other agreement that exist between the parties. </p>



            <p>12. GOVERNING LAW/DISPUTE RESOLUTION. This Agreement shall be interpreted under the laws of the State of New York without regard to conflict of law provisions.  </p>



            <p>13. ENTIRE AGREEMENT. This Agreement constitutes the entire agreement between the parties and supersedes all other written or oral statements or previous agreements regarding the License, Trademarks, or Content. </p>
          </article>
          <footer class="card-footer">
            <section class="card-footer-item">
              <form name="ula-role-update" id="ula-role-update" action="<?php the_permalink(); ?>" method="post">
			          <p>
                  <label>
                    <input name="ula-agreement" type="checkbox" id="ula-agreement" value="1"> I understand the terms described in the End-User License Agreement (EULA).
                  </label>
			            <input type="hidden" name="submitted" value="1">
                  <?php echo $ulaError; ?>
                  <input type="submit" class="button is-primary">
                </p>
              </form>
            </section>
          </footer>
        </div>
      </div>
    </div>
  </div>
</section>
