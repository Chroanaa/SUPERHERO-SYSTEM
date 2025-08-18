
import { Mail } from "lucide-react";
import { LiaLinkedinIn, LiaMastodon, LiaFacebook, LiaInstagram } from "react-icons/lia";
import { RippleButton } from "@/components/magicui/ripple-button";
import { Link } from "react-router-dom";
import { FaDiscord } from "react-icons/fa"

function Footer() {
  return (
    <footer id="contacts" className="xs:p-8 lg:p-12 border-t">
      <div className="flex items-start justify-start flex-col space-y-3 selection:bg-primary selection:text-white dark:selection:bg-primary dark:selection:text-black ">
        <h1 className="text-2xl font-bold tracking-tight">Unofficial page of Brgy. Sta. Lucia in Quezon City.</h1>
        <p>Made by QCU Students.</p>
        <div className="flex items-start flex-row space-x-2 text-sm">
          <Link to="https://www.linkedin.com/in/lash0000/" target="_blank">
            <RippleButton rippleColor="#ADD8E6" className="border p-2.5 rounded-full">
              <LiaFacebook size={24} />
            </RippleButton>
          </Link>
          <Link to="" target="_blank">
            <RippleButton rippleColor="#ADD8E6" className="border p-2.5 rounded-full">
              <LiaInstagram size={24} />
            </RippleButton>
          </Link>
          <Link to="mailto:">
            <RippleButton rippleColor="#ADD8E6" className="border p-2.5 rounded-full">
              <Mail />
            </RippleButton>
          </Link>


        </div>

      </div>
    </footer >
  )
}

export default Footer;
