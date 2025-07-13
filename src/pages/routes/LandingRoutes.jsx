import Appbar_Layout from "@/components/layouts/public/Appbar";
import { Route } from "react-router-dom";
import LandingPage from "../landing/LandingPage";

const LandingRoutes = () => [
  <Route path="/" element={<Appbar_Layout />}>
    <Route index element={<LandingPage />} />
  </Route>
]

export default LandingRoutes;
