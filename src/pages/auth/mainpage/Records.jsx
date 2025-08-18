import { Badge } from "@/components/ui/badge";
import { useNavigate, useLocation } from "react-router-dom";

function BarangayRecords() {
  const navigate = useNavigate();
  const location = useLocation();
  const currentPath = location.pathname;

  return (
    <section id="barangay-records">
      <div className="px-6 space-y-4">
        <div id="user-profile" className="max-w-2xl space-y-2 break-words">
          <h1 className="font-medium tracking-tighter text-3xl">Barangay Records</h1>
          <p className="leading-6 text-md text-muted-foreground">
            Set of resident profiling, complaints, LGU orders, and other applicable archives.
          </p>
        </div>
        <div id="tile-options">
          <div className="grid grid-cols-3 gap-4">
            <div
              className="border p-4 rounded-xl space-y-2 cursor-pointer bg-card hover:shadow-lg hover:border-neutral-300 dark:hover:border-neutral-600 dark:hover:shadow-none"
              onClick={() => navigate(`${currentPath}/residents`)}
            >
              <div className="flex gap-2">
                <Badge>Profiling</Badge>
                <Badge variant="secondary">Records</Badge>
              </div>
              <div className="max-w-2xl break-words">
                <h1 className="font-semibold text-lg leading-10">Residents</h1>
                <p className="text-sm text-muted-foreground">Access demographics, transactional history and necessary proof of residency.</p>
              </div>
            </div>
            <div
              className="border p-4 rounded-xl space-y-2 cursor-pointer bg-card hover:shadow-lg hover:border-neutral-300 dark:hover:border-neutral-600 dark:hover:shadow-none"
              onClick={() => navigate(`${currentPath}/cases`)}
            >
              <div className="flex gap-2">
                <Badge>Case Records</Badge>
                <Badge variant="secondary">Complaints</Badge>
                <Badge variant="secondary">Archives</Badge>
              </div>
              <div className="max-w-2xl break-words">
                <h1 className="font-semibold text-lg leading-10">Cases</h1>
                <p className="text-sm text-muted-foreground">Access records, LUPON decisions and ordinances for BPSO,BCPC and BADAC.</p>
              </div>
            </div>
            <div
              className="border p-4 rounded-xl space-y-2 cursor-pointer bg-card hover:shadow-lg hover:border-neutral-300 dark:hover:border-neutral-600 dark:hover:shadow-none"
              onClick={() => navigate(`${currentPath}/e-services`)}
            >
              <div className="flex gap-2">
                <Badge>Processing</Badge>
                <Badge variant="secondary">Documents</Badge>
              </div>
              <div className="max-w-2xl break-words">
                <h1 className="font-semibold text-lg leading-10">E-Services</h1>
                <p className="text-sm text-muted-foreground">Access ready to made necessary documents for residents such as Indigency, Cedula and many more.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}

export default BarangayRecords;
