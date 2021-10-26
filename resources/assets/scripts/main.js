/** import external dependencies */
import $ from "jquery/dist/jquery.js";
import "jquery-validation/dist/jquery.validate";
import Swiper, { Navigation, Pagination } from "swiper";
import MicroModal from "micromodal";
import SimpleBar from "simplebar";

import Combobo from "combobo";

/** import local dependencies */
import Router from "./util/Router";
import common from "./routes/common";
import pageTemplateTemplateHomepage from "./routes/homepage";
import pageTemplateTemplateFindYourMajor from "./routes/findYourMajor";
import pageTemplateTemplateHowToApply from "./routes/howToApply";
import pageTemplateTemplateTuitionFinaidScholarships from "./routes/tuitionFinAidScholarships";
import pageTemplateTemplateLife from "./routes/lifeAtMcmurry";
import pageTemplateTemplateInformation from "./routes/information";
import pageTemplateTemplateSearch from "./routes/search";
import pageTemplateTemplateContact from "./routes/contact";
import pageTemplateTemplateNews from "./routes/news";
import pageTemplateTemplateNewsDetail from "./routes/newsDetail";
import pageTemplateTemplateFacultyStaffDirectory from "./routes/facultyStaff";

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router( {
  /** All pages */
  common,

  pageTemplateTemplateHomepage,
  pageTemplateTemplateFindYourMajor,
  pageTemplateTemplateHowToApply,
  pageTemplateTemplateTuitionFinaidScholarships,
  pageTemplateTemplateLife,
  pageTemplateTemplateInformation,
  pageTemplateTemplateSearch,
  pageTemplateTemplateContact,
  pageTemplateTemplateNews,
  pageTemplateTemplateNewsDetail,
  pageTemplateTemplateFacultyStaffDirectory
} );

/** Load Events */
$( document ).ready( () => routes.loadEvents() );
