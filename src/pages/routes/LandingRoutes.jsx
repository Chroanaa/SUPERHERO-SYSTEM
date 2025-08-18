import Appbar_Layout from "@/components/layouts/public/Appbar";
import { Route } from "react-router-dom";
import LandingPage from "../landing/LandingPage";
import Login from "../landing/Login";

const LandingRoutes = () => [
  <Route key="landing" path="/" element={<Appbar_Layout />}>
    <Route index element={<LandingPage />} />
  </Route>,
  <Route key="login" path="/login" element={<Login />} />
]

export default LandingRoutes;
