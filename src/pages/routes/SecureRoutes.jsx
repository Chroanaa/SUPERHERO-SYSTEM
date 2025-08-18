import App_Layout from "@/components/layouts/main/Appbar";
import { Route } from "react-router-dom";
import Main from "../auth/Main";
import Main_TabSelections from "../auth/mainpage/TabSelections";
import ResidentRecords from "../auth/residents/ResidentRecords";
import BarangayRecords from "../auth/mainpage/Records";
import Resident from "../auth/residents/Resident";

const SecureRoutes = () => [
  <Route key="main" path="/test-page" element={<App_Layout />}>
    <Route index element={<Main_TabSelections />} />
    <Route path="overview" element={<Main_TabSelections initialTab="tab-1" />} />
    <Route path="records" element={<Main_TabSelections initialTab="tab-2" />}>
      <Route index element={<BarangayRecords />} />
      <Route path="residents" element={<ResidentRecords />} />
      <Route path="residents/profile/:id" element={<Resident />} />
    </Route>
    <Route path="test3" element={<Main_TabSelections initialTab="tab-3" />} />
  </Route>
]

export default SecureRoutes;
